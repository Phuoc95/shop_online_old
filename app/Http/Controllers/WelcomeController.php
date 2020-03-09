<?php namespace App\Http\Controllers;
use DB,Mail,Cart; /*Phai khai bao DB vs Su dung Mail*/
//use Request;
use App\User;
use App\Product;
use App\Gadget;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth,Hash,Crypt;

class WelcomeController extends Controller {


	public function getLienhe (){

		return view('user.pages.contact');
	} 

	public function postLienhe (){

			/*	$data= ['hoten'=>'Duy phuoc'] ;
			Mail::send('emails.blank',$data,function($msg){  //Them 1 bien tu tao msg

				$msg->from('phuoctest123@gmail.com','Duy Phuoc');
				$msg->to('phuoctest123@gmail.com','Khach')->subject('Day la Mail test');

			});*/

		// 	$data =['hoten'=>'Duy phuoc'];
		// 	Mail::send('emails.blank',$data,function($msg){
		// 		$msg->from('nguyenducnhiem98@gmail.com','Phuoc');
		// 		$msg->to('nguyenducnhiem98@gmail.com','Khach')->subject('Đây là email được gửi từ Phuoc');
		// 	});	
		// 	echo "<script > 
		// 	alert('Cam on ban da gop y ')
		// 	window.location = '".url('/')."'
		// </script>";


			$data =['hoten'=>'Duy Phuoc'];
			Mail::send('emails.blank',$data,function($msg){
				$msg->from('phuoctest123@gmail.com','Người gửi');
				$msg->to('phuoctest123@gmail.com','Người nhận')->subject('Đây là email được gửi từ ShopOnline');
			});	
			echo "<script > 
			alert('Cảm ơn bạn đã đặt hàng ! ')
			window.location = '".url('/')."'
		</script>";
	}


	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	//Ko ve trang Home	
	// public function __construct()
	// {
	// 	$this->middleware('guest');
	// }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	
	public function index()
	{
		$feature_product = DB::table('products')->select()->orderBy('buyed','DESC')->skip(0)->take(5)->get();					
		$latest_product  = DB::table('products')->select()->orderBy('id','DESC')->skip(0)->take(5)->get();
		$feature_gadget  = DB::table('gadgets')->select()->orderBy('buyed','DESC')->skip(0)->take(5)->get();
		$latest_gadget   = DB::table('gadgets')->select()->orderBy('id','DESC')->skip(0)->take(5)->get();
		return view('user.pages.home',compact('feature_product','latest_product','feature_gadget','latest_gadget'));
	}

	public function loaisanpham($id){	
		 // $id = Crypt::decrypt($id);  
		 // 		echo "<pre>";
		 // 		print_r ($id);
		 // 		echo "</pre>";
		 // 		die();
		 		
		$product_cate = DB::table('products')->where('cate_id',$id)->select()->paginate(12);;
		$rows = DB::table('products')->where('cate_id',$id)->count();
			//Dung Paginate De lay  so sp 1 trang
		 	 // De Y :
		 	 // 	Truy cap ptu thu 0 -> lay cate_id
		 	 // 	Chi nen lay phan tu dau tien cua mang = Lenh first()  Vi neu lay tat ca Nhieu khi ko co DL
		 	 // 	se bi loi Non-object
		return view('user.pages.cate',compact('product_cate','rows','id'));
	}
	public function loaiphukien($id)
	{	
		$gadget_cate = DB::table('gadgets')->where('gadgetcate_id',$id)->select()->paginate(12);;
		$rows = DB::table('gadgets')->where('gadgetcate_id',$id)->count();	
		return view('user.pages.gadgetcate',compact('gadget_cate','rows','id'));
	}
	
	//-----------------
	public function chitietsanpham($id){
		$product_detail = DB::table('products')->where('id',$id)->first();
		$image= DB::table('product_images')->select('id','image')->where('product_id',$product_detail->id)->get();
		$product_cate= DB::table('products')->where('cate_id',$product_detail->cate_id)   //Lay SP cung loai
		->where('id','<>',$product_detail->id)->take(2)->get();
		//Khac SP hien tai
		return view('user.pages.productdetail',compact('product_detail','image','product_cate'));
	}
	public function chitietphukien($id){
		$gadget_detail = DB::table('gadgets')->where('id',$id)->first();
				// echo "<pre>";
				// print_r ($gadget_detail);
				// echo "</pre>";
				// die();
				
				
		$image= DB::table('gadget_images')->select('id','image')->where('gadget_id',$gadget_detail->id)->get();
		$gadget_cate= DB::table('gadgets')->where('gadgetcate_id',$gadget_detail->gadgetcate_id)  
		->where('id','<>',$gadget_detail->id)->take(2)->get();		
		return view('user.pages.gadgetdetail',compact('gadget_detail','image','gadget_cate'));
	}

	//-----------------
	public function thanhvien(){
		// $data = DB::table('users')->find($id);
		// 		echo "<pre>";
		// 		print_r ($data);
		// 		echo "</pre>";
		// 		die();				
		return view('user.pages.user');

	}
	public function doithongtin(Request $request ){	

		$data = User::find($id=Auth::user()->id);		
		$data-> name = $request->txtName;   
		$data-> email = $request->txtEmail;
		$data-> address = $request->txtAddress;
		$data-> phone = $request->phone;
		$data->save();
		return redirect()-> route('thanhvien')->with(['flash_message' =>'Cập nhật thông tin thành công']);
		
	}


	public function doimatkhau(Request $request ){	
		$data = User::find($id=Auth::user()->id);

		$this->validate($request, ['txtOldPassword1'=>'required'],
			['txtOldPassword1.required'=> 'Bạn phải nhập mật khẩu cũ' ] );
		$this->validate($request, ['txtNewPassword1'=>'required'],
			['txtNewPassword1.required'=> 'Bạn phải nhập mật khẩu mới' ]);

		$this->validate($request, ['txtRePass1'=>'required'],
			['txtRePass1.required'=> 'Bạn phải nhập xác nhận mật khẩu' ]);

		$this->validate($request, ['txtRePass1'=>'same:txtNewPassword1'],
			['txtRePass1.same'=> 'Mật khẩu không giống nhau' ]);

		$oldpass1= DB::table('users')->select('password')->where('id',Auth::user()->id)->first();				
		$oldpass1= $oldpass1->password;

		$OldPass1 = Hash::make($request ->txtOldPassword1);
		if(!Hash::check($request ->txtOldPassword1, $oldpass1)){
			
			echo '<script type="text/javascript" charset="utf-8" async defer>';
			echo 'alert("Mật khẩu cũ không đúng")';		
			echo '</script>'; 

			echo '<script type="text/javascript" charset="utf-8" async defer>';
			echo ' location.href = "thanh-vien";';		
			echo '</script>'; 


		}
		else {
			$NewPass = $request->txtNewPassword1;
			$data->password = Hash::make($NewPass);
			$data->remember_token = $request->input('_token');
			$data->save();
			return redirect()-> route('thanhvien')->with(['flash_message' =>'Cập nhật mật khẩu thành công']);
		};			
		
	}


	//-----------------
	public function muahang($id){		
		$product_buy = DB::table('products')->where('id',$id)->first(); 
		if($product_buy->discount != 0){
			$pri = $product_buy->price -$product_buy->discount ;

		}elseif ($product_buy->discount_percent != 0) {                                         
			$percent= discount_percent_value($product_buy->discount_percent);                  
			$pri = $product_buy->price - $product_buy->price*$percent/100 ;               
		}
		else $pri = $product_buy->price;

		Cart::add(array('id'=>$id,'name'=>$product_buy->name,'quantity'=> 1 , 'price'=>$pri,'attributes' => array('image'=>$product_buy->image,'discount'=>$product_buy->discount,'discount_percent'=>$product_buy->discount_percent)));
		$content = Cart::getContent(); 
			//Khi thuc hien Bam Add  thi moi thong tin truy van se dc Luu vao $content
		//print_r($content);
		return redirect()->route('giohang'); 	/*print_r($content);;*/
	} 
	public function muaphukien($id){
		$gadgets_buy = DB::table('gadgets')->where('id',$id)->first(); 	
		if($gadgets_buy->discount != 0){
			$pri = $gadgets_buy->price -$gadgets_buy->discount ;

		}elseif ($gadgets_buy->discount_percent != 0) {                                         
			$percent= discount_percent_value($gadgets_buy->discount_percent);                  
			$pri = $gadgets_buy->price - $gadgets_buy->price*$percent/100 ;               
		}else $pri = $gadgets_buy->price;	
		Cart::add(array('id'=>$id,'name'=>$gadgets_buy->name,'quantity'=> 1 , 'price'=>$pri,'attributes' => array('image'=>$gadgets_buy->image,'discount'=>$gadgets_buy->discount,'discount_percent'=>$gadgets_buy->discount_percent)));
			//$Gcontent = Cart::getContent(); 			
				// echo "<pre>";
				// print_r ($content);
				// echo "</pre>";
				// die();
		return redirect()->route('giohang'); 	/*print_r($content);;*/
	}  

	//-----------------------
	public function giohang(){
		$content = Cart::getcontent();	
		return view('user.pages.cart',compact('content'));
	}
	public function xoasanpham($id){
		Cart::remove($id);
		return redirect()->route('giohang');
	}  

	//-----------------
	// public function ketquatimkiem($id=2){
	// 	$gadget_cate = DB::table('gadgets')->where('gadgetcate_id',$id)->select()->paginate(2);;
	// 	$rows = DB::table('gadgets')->where('gadgetcate_id',$id)->count();	
	// 	return view('user.pages.resultsearch',compact('gadget_cate','rows','id'));
	// }
	public function timkiem(Request $request ){
		$keywork = $request->txtsearch;
		$dataP=Product::where('name', 'LIKE', '%'.$keywork.'%')->get();
		$dataG=Gadget::where('name', 'LIKE', '%'.$keywork.'%')->get();
		$numrowsP=Product::where('name', 'LIKE', '%'.$keywork.'%')->count();
		$numrowsG=Gadget::where('name', 'LIKE', '%'.$keywork.'%')->count();
				// print_r ($dataG);
				// echo "</pre>";
				// die();
		return view('user.pages.search',compact('dataP','dataG','numrowsP','numrowsG','keywork'));
	}


	public function dashboard(){
		return view('admin.dashboard');
	}

}
