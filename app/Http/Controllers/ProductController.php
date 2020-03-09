<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
							/*Ko su dung Illuminate khi Su Dung AJax , nen sdung use Request*/
use App\Product;
use App\Cate;
use App\ProductImage;
use App\Http\Requests\ProductRequest;
use Input;
use File;
use Auth;


class ProductController extends Controller {

	public function getAdd(){

		$cate = Cate::select('name','id')->orderBy('id','DESC')->get()->toArray();
		return view('admin.product.add',compact('cate'));		 

	}
	public function postAdd(ProductRequest $product_request){

		$data = Product::select('total')->orderBy('id','DESC')->get()->toArray();

		$file_name = $product_request->file('fImages')->getClientOriginalName();

		$product = new Product;
		$product -> name = $product_request->txtName;
		$product -> alias = changeTitle($product_request->txtName);
		$product -> price = $product_request->txtPrice;		
		// $product -> intro = "";
		$product -> description = $product_request->txtDescription;
		$product -> image = $file_name ;
		$product -> total = $product_request->txtTotal;
		$product -> discount = $product_request->txtDiscount;
		$product -> discount_percent = $product_request->sltDiscount;
		$product -> user_id = Auth::user()->id;
		$product -> cate_id = $product_request->sltCate;
		$product_request->file('fImages')->move('images/product',$file_name);
		$product->save();

		$product_id =$product->id; /*Lay id Anh tuong ung*/

		if (Input::hasFile('fProductDetail')){

			foreach (Input:: file('fProductDetail') as $file){
				/*print_r(Input::file('fProductDetail'));*/

				$product_img = new ProductImage();

				if(isset($file)){
					$product_img->image = $file->getClientOriginalName();
					$product_img->product_id=$product_id;
					$file->move('images/product/detail',$file->getClientOriginalName());
					$product_img->save();
				}
			}

		}
		return redirect()->route('admin.product.list')->with(['flash_level'=>'success','flash_message'=>'Thêm Sản Phẩm thành công !!']);		
	}



	public function getEdit($id){ 

		$cate = Cate::select('id','name')->get()->toArray();
		$product = Product::find($id);	
		$product_image = Product::find($id)->pimage;	
		return view('admin.product.edit',compact('cate','product','product_image'));
	}


	public function postEdit(Request $request,$id)
	{

$this->validate($request,['txtName'=>'unique:products,name,'.$id],['txtName.unique'=>'Tên sản phẩm bị trùng'] );
$this->validate($request,['txtName'=>'required'],['txtName.required'=>'Vui lòng nhập Tên sản phẩm'] );
$this->validate($request,['sltCate'=>'required'],['sltCate.required'=>'Vui lòng chọn Loại sản phẩm']);
$this->validate($request,['txtTotal'=>'required'],['txtTotal.required'=>'Vui lòng nhập tổng']);
$this->validate($request,['txtPrice'=>'required'],['txtPrice.required'=>'Vui lòng nhập giá']);

		$product =  Product::find($id);
		$product -> name = $request->txtName;
		$product -> alias = changeTitle($request->txtName);
		$product -> price = $request->txtPrice;		
		// $product -> intro = "";
		$product -> description = $request->txtDescription;
		$product -> total = $request->txtTotal;
		$product -> discount = $request->txtDiscount;
		$product -> discount_percent = $request->sltDiscount;
		$product -> user_id = Auth::user()->id;;
		$product -> cate_id = $request->sltCate;	
		
		if(!empty($request->file('fImages'))){
			$file_name = $request->file('fImages')->getClientOriginalName();
            $product->image = $file_name;	

            $request->file('fImages')->move('images/product/',$file_name);
            /*Chuyen hinh moi vao Folde upload */

            $image_current = 'images/product/'.$request->input('img_current');;
            if(File::exists($image_current))	/*Xoa hinh cu Neu co*/
            {
            	File::delete($image_current);
            }
        }
        else {
        	echo 'Không có file';
        }
	    $product->save(); 

	    if(!empty($request->file('fProductDetail'))) //Kiem tra co File ton tai ko roi Duyet
	    {
	    	foreach ($request->file('fProductDetail') as $file) {
	           # code...
	    		$product_img = new ProductImage();
	    		if(isset($file))
	    		{
	    			$product_img->image      = $file->getClientOriginalName();
	    			$product_img->product_id = $id;
	    			$file ->move('images/product/detail/',$file->getClientOriginalName());
	    			$product_img->save();
	    		}
	    	}
	    } 

	    return redirect()->route('admin.product.list')->with(['flash_message'=>' Sửa sản phẩm thành công !!']); 
	}  



	/*Duyet nhung buc hinh co cung id -> Xoa dua vao moi quan he 1-n tao giua bang ProductvsImage*/
	public function getDelete($id){

		$product_detail=Product::find($id)->pimage->toArray(); /*print_r($product_detail);*/		
		foreach ($product_detail as $value) {

			File::delete('upload/detail/'.$value["image"]);
			/*Day la 1 Mang */
			/*ko can xoa DL trong bang ProductImage vi do da lien ket voi bang Product NEN khi xoa DL bang Product thi->DL trong bang ProductImage cung tu mat di*/									 
		}

		$product=Product::find($id);									 
		File::delete('upload/'.$product->image);
		/*Day la 1 Object */
		$product->delete($id);										 

		return redirect()->route('admin.product.list')->with(['flash_level'=>'success','flash_message'=>' Bạn đã Xóa Sản Phẩm thành công !!']);

	}


	public function getList(){
		$data = Product::OrderBy('id','DESC')->get()->toArray();
		return view('admin.product.list',compact('data'));
	}

}
