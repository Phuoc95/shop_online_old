<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Gadget;
use App\GadgetCate;
use App\GadgetImage;
use App\Http\Requests\GadgetRequest;
use Input;
use File;
use Auth;


class GadgetController extends Controller {

	public function getAdd(){
		$gadgetcate = GadgetCate::select('name','id')->orderBy('id','DESC')->get()->toArray();
		return view('admin.gadget.add',compact('gadgetcate'));
	}

	public function postAdd(GadgetRequest $gadget_request){
		$data = Gadget::select('total')->orderBy('id','DESC')->get()->toArray();
		$file_name = $gadget_request->file('fImages')->getClientOriginalName();

		$gadget = new Gadget;
		$gadget -> name = $gadget_request->txtName;
		$gadget -> alias = changeTitle($gadget_request->txtName);
		$gadget -> price = $gadget_request->txtPrice;		
		// $gadget -> intro = "";
		$gadget -> description = $gadget_request->txtDescription;
		$gadget -> image = $file_name ;
		$gadget -> total = $gadget_request->txtTotal;
		$gadget -> discount = $gadget_request->txtDiscount;
		$gadget -> discount_percent = $gadget_request->sltDiscount;
		$gadget -> user_id = Auth::user()->id;
		$gadget -> gadgetcate_id = $gadget_request->sltGadgetCate;
		$gadget_request->file('fImages')->move('images/gadget',$file_name);
		$gadget->save();	

		$gadget_id =$gadget->id; /*Lay id Anh tuong ung*/
		if (Input::hasFile('fGadgetDetail')){

			foreach (Input:: file('fGadgetDetail') as $file){
				/*print_r(Input::file('fgadgetDetail'));*/

				$gadget_img = new GadgetImage();

				if(isset($file)){
					$gadget_img->image = $file->getClientOriginalName();
					$gadget_img->gadget_id=$gadget_id;
					$file->move('images/gadget/detail',$file->getClientOriginalName());
					$gadget_img->save();
				}
			}

		}
		return redirect()->route('admin.gadget.list')->with(['flash_level'=>'success','flash_message'=>' Thêm phụ kiện thành công !!']);		
	}



	public function getEdit($id){ 
		$gadgetcate = Gadgetcate::select('id','name')->get()->toArray();
		$gadget = Gadget::find($id);	
		$gadget_image = Gadget::find($id)->gimage;	
		return view('admin.gadget.edit',compact('gadgetcate','gadget','gadget_image'));
	}


	public function postEdit(Request $request,$id)
	{ 
$this->validate($request,['txtName'=>'unique:gadgets,name,'.$id],['txtName.unique'=>'Tên phụ kiên bị trùng'] );
$this->validate($request,['sltGadgetCate'=>'required'],['sltGadgetCate.required'=>'Vui lòng chọn Loại phụ kiện']);
$this->validate($request,['txtTotal'=>'required'],['txtTotal.required'=>'Vui lòng nhập tổng']);
$this->validate($request,['txtPrice'=>'required'],['txtPrice.required'=>'Vui lòng nhập giá']);


		$gadget =  Gadget::find($id);
		$gadget -> name = $request->txtName;
		$gadget -> alias = changeTitle($request->txtName);
		$gadget -> price = $request->txtPrice;		
		// $gadget -> intro = "";
		$gadget -> description = $request->txtDescription;
		$gadget -> total = $request->txtTotal;
		$gadget -> discount = $request->txtDiscount;
		$gadget -> discount_percent = $request->sltDiscount;
		$gadget -> user_id = Auth::user()->id;
		$gadget -> gadgetcate_id = $request->sltGadgetCate;	
		/*echo "<pre>";
		print_r ($gadget);
		echo "</pre>";
		die();*/
		
		if(!empty($request->file('fImages'))){
			$file_name = $request->file('fImages')->getClientOriginalName();
			$gadget->image = $file_name;	
			$request->file('fImages')->move('images/gadget/',$file_name);
			/*Chuyen hinh moi vao Folde upload */

			$image_current = 'images/gadget/'.$request->input('img_current');;
			if(File::exists($image_current))	/*Xoa hinh cu Neu co*/
			{
				File::delete($image_current);
			}
		}
		else {echo 'Không có file';	}
		$gadget->save(); 

    if(!empty($request->file('fProductDetail'))) //Kiem tra co File ton tai ko roi Duyet
    {
    	foreach ($request->file('fProductDetail') as $file) {
	           # code...
    		$gadget_img = new GadgetImage();
    		if(isset($file))
    		{
    			$gadget_img->image      = $file->getClientOriginalName();
    			$gadget_img->gadget_id = $id;
    			$file ->move('images/gadget/detail/',$file->getClientOriginalName());
    			$gadget_img->save();
    		}
    	}
    } 

    return redirect()->route('admin.gadget.list')->with(['flash_message'=>' Sửa phụ kiện thành công !!']); 
}  



/*Duyet nhung buc hinh co cung id -> Xoa dua vao moi quan he 1-n tao giua bang gadgetvsImage*/
public function getDelete($id){

	$gadget_detail=Gadget::find($id)->gimage->toArray(); /*print_r($gadget_detail);*/		
	foreach ($gadget_detail as $value) {

		File::delete('images/gadget/detail/'.$value["image"]);

	}

	$gadget=Gadget::find($id);									 
	File::delete('images/gadget/'.$gadget->image);	
	$gadget->delete($id);										 

	return redirect()->route('admin.gadget.list')->with(['flash_level'=>'success','flash_message'=>'Xóa phụ kiện thành công !!']);

}


public function getList(){
	$data = Gadget::OrderBy('id','DESC')->get()->toArray();
	return view('admin.gadget.list',compact('data'));
}

}
