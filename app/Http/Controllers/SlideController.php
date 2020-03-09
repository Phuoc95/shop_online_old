<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Slide;

use App\Http\Requests\slideRequest;
use Input;
use File;
use Auth;


class SlideController extends Controller {

	public function getAdd(){		
		return view('admin.slide.add',compact('slide'));
	}
	public function postAdd(SlideRequest $slide_request){		

		$file_name = $slide_request->file('fImages')->getClientOriginalName();

		$slide = new Slide;
		$slide -> name = $slide_request->txtName;		
		$slide -> description = $slide_request->txtDescription;
		$slide -> image = $file_name ;		
		$slide -> user_id = Auth::user()->id;	
		$slide_request->file('fImages')->move('images/slide/',$file_name);
		$slide->save();		
		return redirect()->route('admin.slide.list')->with(['flash_level'=>'success','flash_message'=>'Thêm Ảnh Slide thành công !!']);		
	}



public function getEdit($id) {
	$slide = Slide::findOrFail($id)->toArray();
	return view('admin.slide.edit',compact('slide'));

}
	public function postEdit(Request $request,$id)
	{

$this->validate($request,['txtName'=>'required'],['txtName.required'=>'Vui lòng nhập Tên'] );

		$slide =  Slide::find($id);
		$slide -> name = $request->txtName;
		$slide -> description = $request->txtDescription;
		$slide -> user_id = 1;
		
		if(!empty($request->file('fImages'))){
			$file_name = $request->file('fImages')->getClientOriginalName();
			$slide->image = $file_name;	
			$request->file('fImages')->move('images/slide/',$file_name);
			/*Chuyen hinh moi vao Folde upload */

			$image_current = 'images/slide/'.$request->input('img_current');;
			if(File::exists($image_current))	/*Xoa hinh cu Neu co*/
			{
				File::delete($image_current);
			}
		}
		else {
			echo 'Không có file';
		}
		$slide->save(); 

		return redirect()->route('admin.slide.list')->with(['flash_message'=>' Sửa sản phẩm thành công !!']); 
	}  



	/*Duyet nhung buc hinh co cung id -> Xoa dua vao moi quan he 1-n tao giua bang slidevsImage*/
	public function getDelete($id){	
		$slide=Slide::find($id);									 
		File::delete('images/slide/'.$slide->image);	
		$slide->delete($id);
		return redirect()->route('admin.slide.list')->with(['flash_level'=>'success','flash_message'=>' Xóa Ảnh Slide thành công !!']);
	}


	public function getList(){
		$data = Slide::OrderBy('id','DESC')->get()->toArray();
		return view('admin.slide.list',compact('data'));
	}

}
