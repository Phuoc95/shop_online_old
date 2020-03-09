<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;						
use App\Order;
use App\Product;
use App\Gadget;
use App\Transaction;
use Input;
use File;
use Auth;
use DB,Mail;


class OrderController extends Controller {
	public function getList(){
		$data = Order::OrderBy('id','DESC')->get()->toArray();
				// echo "<pre>";
				// print_r ($data);
				// echo "</pre>";
				// die();
		return view('admin.order.list',compact('data'));
	}
	public function getDelete($id){
		$data=Order::find($id);	
		$data->delete($id);
		return redirect()->route('admin.order.list')->with(['flash_level'=>'success','flash_message'=>'Xóa Dữ liệu thành công !!']);
	}

	public function getEdit($id){ 	
		$data = Order::find($id)->toArray();		
		return view('admin.order.edit',compact('data'));
	}

	public function postEdit(Request $request,$id)
	{
		$order = Order::find($id);		
		$data = Order::where('id',$id)->first()->toArray();				
		$n = $data['product_id'];		

		// $order->product_name = $request->product_name;	
		// $order->product_qty = $request->product_qty;
		// $order->product_price = $request->product_price;
		// $order->amount = $request->amount;
		$order->status = $request->status;
		//$order->transaction_id = $request->transaction_id;
		if($request->status==4){
			{
				$buyed_pr_cur = Product::where('id',$n)->first();
				$buyed_g_cur = Gadget::where('id',$n)->first();


				if(!empty($buyed_pr_cur))
				{
					$buyed_cur = $buyed_pr_cur['buyed'];
					$qty = $request->product_qty;
					$buyed = $buyed_cur + $qty;

					$data = Product::find($n);
					$data->buyed = $buyed ;
					$data->save();

				}
				elseif(!empty($buyed_g_cur) ){

					$buyed_cur = $buyed_g_cur['buyed'];
					$qty = $request->product_qty;
					$buyed = $buyed_cur + $qty;

					$data = Gadget::find($n);
					$data->buyed = $buyed ;
					$data->save();

				}

			}
		}  
		$order->save();


		$order =  Order::find($id);	
		$transaction  = Transaction::find($order['transaction_id']);
		$buyer  = $transaction['user_email'];
		$data = ['pr'=>$order['product_name'] ];	
		if($request->status==2){
			Mail::send('emails.verify',$data,function($msg)use ($buyer){
				$msg->from('phuoctest123@gmail.com','ShopOnline');
				$msg->to($buyer,'Khách hàng')->subject('Đây là Email được gửi từ ShopOnline');
			});
		} elseif($request->status==4){
			Mail::send('emails.success',$data,function($msg)use ($buyer){
				$msg->from('phuoctest123@gmail.com','ShopOnline');
				$msg->to($buyer,'Khách hàng')->subject('Đây là Email được gửi từ ShopOnline');
			});
		}
		elseif($request->status==5){
			Mail::send('emails.fail',$data,function($msg)use ($buyer){
				$msg->from('phuoctest123@gmail.com','ShopOnline');
				$msg->to($buyer,'Khách hàng')->subject('Đây là Email được gửi từ ShopOnline');
			});
		}

		return redirect()->route('admin.order.list')->with(['flash_message'=>' Cập nhật  thành công !!']); 
	}  


}
