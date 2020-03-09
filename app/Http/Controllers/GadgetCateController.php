<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\GadgetCateRequest;
use App\GadgetCate;

class GadgetCateController extends Controller {
	public function getlist()
	{
		$data = GadgetCate::orderBy('id','DESC')->get()->toArray();
		return view('admin.gadgetcate.list',compact('data'));
	}

	public function getAdd()
	{	
		return view('admin.gadgetcate.add');
	}
	public function postAdd(GadgetCateRequest $request)

	{
		$gagetcate = new GadgetCate;
		$gagetcate -> name = $request->txtGadgetCateName;
		$gagetcate -> alias = changeTitle($request->txtGadgetCateName);	
		$gagetcate -> description = $request->txtDescription;
		$gagetcate->save();
		return redirect()->route('admin.gadgetcate.list')->with(['flash_level'=>'success','flash_message'=>'Thêm dữ liệu thành công !']);
	}


	public function getDelete($id)	{           
		
			$gagetcate =GadgetCate::find($id);
			$gagetcate->delete($id);
			return redirect()->route('admin.gadgetcate.list')->with(['flash_message'=>' Xóa dữ liệu thành công !']);
	} 




public function getEdit($id) {
	$data = GadgetCate::findOrFail($id)->toArray();
	//$parent = Cate::select('id','name','parent_id')->orderBy('id','DESC')->get()->toArray();
	return view('admin.gadgetcate.edit',compact('data'));

}
public  function postEdit(Request $request,$id){
	/*Chu Y ::::Request Ko S*/
$this -> validate($request,["txtGadgetCateName" => "required"],["txtGadgetCateName.required" => "Vui lòng nhập vào tên danh mục"]);
$this->validate($request,['txtGadgetCateName'=>'unique:gadget_cates,name,'.$id],['txtGadgetCateName.unique'=>'Loại phụ kiện đã tồn tại'] );
	// $this -> validate($request,
	// 	["txtGadgetCateName" => "required"],
	// 	["txtGadgetCateName.required" => "Vui lòng nhập vào tên danh mục"],
	// 	["txtGadgetCateName" => "unique:cates,name"],
	// 	["txtGadgetCateName.unique" => "Tên danh mục bị trùng"]
	// );

	$gagetcate = GadgetCate::find($id);
	$gagetcate -> name = $request ->txtGadgetCateName;
	$gagetcate -> alias = changeTitle($request ->txtGadgetCateName);	
	$gagetcate -> description = $request ->txtDescription;
	$gagetcate -> save();
	return redirect()->route('admin.gadgetcate.list')->with(['flash_level'=>'success','flash_message'=>' Sửa dữ liệu  thành công !!']);		

}


}
