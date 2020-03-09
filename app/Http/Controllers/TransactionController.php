<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;						
use App\Order;
use App\Cate;
use App\Contact;
use App\Transaction;
use App\Http\Requests\ProductRequest;
use Input;
use File;
use Auth;
use Mail;
class TransactionController extends Controller {

	public function getList(){
		$data = Transaction::OrderBy('id','DESC')->get()->toArray();
		return view('admin.transaction.list',compact('data'));
	}
	public function getDelete($id){
		// $order_detail=Transaction::find($id)->order->toArray(); // print_r($order_detail);
		// 	 foreach ($order_detail as $value)
		// 	 	$value->delete($id);	
		
		$data=Transaction::find($id); 	
		$data->order()->delete();
		$data->delete($id);	
		return redirect()->route('admin.transaction.list')->with(['flash_level'=>'success','flash_message'=>'Xóa Dữ liệu thành công !!']);
	}


	public function getEdit($id){
		$data = Transaction::findOrFail($id);
		return view('admin.transaction.edit',compact('data'));
		
	}

	public function postEdit(Request $request,$id){
		$data =  Transaction::find($id);		
		// $data -> type = 1;
		$data -> status = $request->status;	
		// $data -> user_id = $request->user_id;;
		$data -> user_name = $request->user_name;
		$data -> user_email = $request->user_email;
		$data -> user_phone = $request->user_phone;
		$data -> user_address = $request->user_address;
		// $data -> amount = $request->amount;
		// $data -> payment = $request->payment;
	
				// echo "<pre>";
				// print_r ($data);
				// echo "</pre>";
				// die();		
		$data->save();

		if($request->status==2){
			$data = [''];	
			$buyer = $request->user_email;
			Mail::send('emails.verify',$data,function($msg)use ($buyer){
				$msg->from('phuoctest123@gmail.com','ShopOnline');
				$msg->to($buyer,'Khách hàng')->subject('Đây là Email được gửi từ ShopOnline');
			});
		}
		
		$order = Order::where('transaction_id',$id)->get()->toArray();
		$order1 = Order::where('transaction_id',$id)->first();
		$kt = $order1->id;
		$numrow= Order::where('transaction_id',$id)->count();
		for ($i=$kt; $i < $kt+$numrow ; $i++) { 
			$order =  Order::find($i);
			if($request->status==1)
				$order->status = 1;
			else $order->status = 2;
			$order->save();
		}
			// echo "<pre>";
			// print_r ($order);
			// echo "</pre>";
			// die();

		return redirect()->route('admin.transaction.list')->with(['flash_message'=>' Cập nhật  thành công !!']); 
	} 

	public function receipt($id){
		$addr = Contact::first();
		$transaction = Transaction::where('id',$id)->first();
		$data = Order::where('transaction_id',$id)->OrderBy('id','DESC')->get()->toArray();
		return view('admin.transaction.reciept',compact('data','transaction','addr'));
					
	} 

}
