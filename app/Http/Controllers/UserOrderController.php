<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;						
use App\Transaction;
use App\Order;
use App\Http\Requests\InfoRequest;
use Input;
use File;
use Auth;
use DB,Mail,Cart;


class UserOrderController extends Controller {

	public function dathang(InfoRequest $info_request ){
	if ( count(Cart::getcontent() ) == 0 )
			
			echo"<script language='javascript'>
		alert('Không có sản phẩm trong giỏ . Mời bạn mua hàng trên website !')
		window.location = '".url('/')."'
	</script>
	";
	else {
		if(Auth::check())
			$user_id = Auth::user()->id;
		else  $user_id ='';
		$data = new Transaction;
		// $data -> type = 1;
		$data -> status = 1;
		$data -> user_id =  $user_id;
		$data -> user_name = $info_request->user_name;
		$data -> user_email = $info_request->user_email;
		$data -> user_phone = $info_request->user_phone;
		$data -> user_address = $info_request->user_address;
		$data -> amount = $info_request->Tamount;
		$data -> payment = $info_request->payment;
		// $data -> payment_info = '';
		// $data -> security = '';
		
				// echo "<pre>";
				// print_r ($data);
				// echo "</pre>";
				// die();
		$data->save();

		foreach(Cart::getcontent() as $row) {
			$data=Transaction::orderBy('id','DESC')->first()->toArray();
			$transaction_id = $data['id'];
					// echo "<pre>";
					// print_r ($transaction_id);
					// echo "</pre>";
					// die();
			
			$order = new Order;	
			$order->transaction_id = $transaction_id;
			$order->product_id = $row['id'];
			$order->product_name = $row['name'];
			$order->product_image = $row['attributes']['image'];
			$order->product_qty = $row['quantity'];
			$order->product_price = $row['price'];
			$order->amount = $row['price']*$row['quantity'];
			$order->status = 1;			
			      		// echo "<pre>";
			      		// print_r ($order);
			      		// echo "</pre>";
			$order->save();
		}
		

		foreach(Cart::getcontent() as $row)
			Cart::remove( $row['id']);

		if($info_request->payment == 1){
        // $buyer = $info_request->user_email;
// 							echo "<pre>";
// 							print_r($buyer);
// 							echo "</pre>";

// 							echo gettype($buyer);
// 							die();
			
			$buyer =$info_request->user_email;
			Mail::send('emails.info',$data,function($msg)use ($buyer){
				$msg->from('phuoctest123@gmail.com','ShopOnline');
				$msg->to($buyer,'Khách hàng')->subject('Đây là Email được gửi từ ShopOnline');
			});	
			echo "<script > 
			alert('Cảm ơn bạn đã đặt hàng ! ')
			window.location = '".url('/')."'
		</script>";

	}


		// return redirect('/'); 


	else {

		$Tamount2 =	$info_request->Tamount;
		$data=Transaction::orderBy('id','DESC')->first()->toArray();
		$transaction_id = $data['id'];

		return redirect()->route('thanhtoan')
		->with(['Tamount2'=>$Tamount2,'transaction_id'=>$transaction_id]);
	} 

}
}

public function thanhtoan(){ 
	return view('user.pages.checkout');
}
public function thanhtoanr(Request $request){ 	/*
	$Tamount2 = $request->route()->parameters()['Tamount2'];
	$transaction_id = $request->route()->parameters()['transaction_id'];*/

    $Tamount2 = $request->route()->parameters()['Tamount2'];
	$transaction_id = $request->route()->parameters()['transaction_id'];	
	return view('user.pages.checkout',compact('Tamount2','transaction_id'));
}

public function paid($transaction_id){
	// $transaction_id = Crypt::decrypt($transaction_id);   
	$data = Transaction::find($transaction_id);
	$data->status=2;
	$data->save(); 

	//$order = Order::where('transaction_id',$transaction_id)->get()->toArray();
	
	$order1 = Order::where('transaction_id',$transaction_id)->first();
	$init = $order1->id;
	
	$numrow= Order::where('transaction_id',$transaction_id)->count();
	for ($i=$init; $i < $init+$numrow ; $i++) { 
		$order =  Order::findOrFail($i);
		
		$order->status = 2;
		$order->save();
	}


	$data = [''];	
	$buyer = Transaction::where('id',$transaction_id)->first();
	$buyer = $buyer->user_email;
	Mail::send('emails.verify',$data,function($msg)use ($buyer){
		$msg->from('phuoctest123@gmail.com','ShopOnline');
		$msg->to($buyer,'Khách hàng')->subject('Đây là Email được gửi từ ShopOnline');
	});
	

	return redirect('/');
}

public function fail($id){
	$data = Transaction::find($id);
	$data->status=1;
	$data->save(); 
	return redirect('/');
}


}
