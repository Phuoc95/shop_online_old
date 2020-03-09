<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Cate;
use App\ProductImage;
use App\GadgetImage;
use App\Slide;
use App\Http\Requests\ProductRequest;
use Input;
use File;
use Auth;
use Request;
use DB,Mail,Cart;

class AjaxController extends Controller {

	public function getDelImg($id){
		if(Request::ajax()){  /* Kiem tra Neu DL la Ajax */
			$idHinh = (int)Request:: get('idHinh');/*Phai truyen Tu Ben  Ajax sang 1 idHinh*/
			$image_detail = ProductImage::find($idHinh);
			if(!empty($image_detail)){
				$img ='images/product/detail/'.$image_detail->image;
				if(File::exists($img)){
					File::delete($img);
				}
				$image_detail->delete(); 
			}
			return 1;
		}
	}
	
		public function getDelGImg($id){
		if(Request::ajax()){ 
			$idHinh = (int)Request:: get('idHinh');
			$image_detail = GadgetImage::find($idHinh);
			if(!empty($image_detail)){
				$img ='images/product/detail/'.$image_detail->image;
				if(File::exists($img)){
					File::delete($img);
				}
				$image_detail->delete(); 
			}
			return 1;
		}
	}

	//cap nhat gio hang
	public function capnhat(){
		if(Request::ajax())
		{
			$id = Request::get('id');
			$qty = Request::get('qty');
			
			Cart::update($id, array(
				'quantity' => array(
					'relative' => false	,
					'value' => $qty
					),
				));			
		}
		return 1;
	}
}

