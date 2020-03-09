<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\CateRequest;
use App\Cate;

class CateController extends Controller {


	public function getlist()
	{
		$data = Cate::orderBy('id','DESC')->get()->toArray();
		return view('admin.cate.list',compact('data'));
	}


	public function getAdd()

	{
		//$parent = Cate::select('id','name','parent_id')->orderBy('id','DESC')->get()->toArray();
		return view('admin.cate.add');
	}
	public function postAdd(CateRequest $request)

	{
		$cate = new Cate;
		$cate -> name = $request->txtCateName;
		$cate -> alias = changeTitle($request->txtCateName);	
		$cate -> description = $request->txtDescription;
		$cate->save();
		return redirect()->route('admin.cate.list')->with(['flash_level'=>'success','flash_message'=>'Thêm dữ liệu thành công !']);
	}


	public function getDelete($id)	{           
		
			$cate =Cate::find($id);
			$cate->delete($id);
			return redirect()->route('admin.cate.list')->with(['flash_message'=>' Xóa dữ liệu thành công !']);
	} 




public function getEdit($id) {
	$data = Cate::findOrFail($id)->toArray();
	//$parent = Cate::select('id','name','parent_id')->orderBy('id','DESC')->get()->toArray();
	return view('admin.cate.edit',compact('data'));

}
public  function postEdit(Request $request,$id){
	/*Chu Y ::::Request Ko S*/

	$this -> validate($request,["txtCateName" => "required"],["txtCateName.required" => "Vui lòng nhập vào tên danh mục"]);
	$this->validate($request,['txtCateName'=>'unique:cates,name,'.$id],['txtCateName.unique'=>'Loại sản phẩm đã tồn tại'] );
		

	$cate = Cate::find($id);
	$cate -> name = $request ->txtCateName;
	$cate -> alias = changeTitle($request ->txtCateName);	
	$cate -> description = $request ->txtDescription;
	$cate -> save();
	return redirect()->route('admin.cate.list')->with(['flash_level'=>'success','flash_message'=>' Sửa dữ liệu  thành công !!']);		

}


}
