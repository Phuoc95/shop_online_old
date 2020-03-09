<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;
use App\Http\Requests\ContactRequest;
use Input;
use File;
use Auth;


class ContactController extends Controller {

	public function getAdd(){		
		//return view('admin.contact.add',compact('contact'));
		return view('admin.contact.add');
	}
	public function postAdd(ContactRequest $contact_request){
		$contact = new Contact;
		$contact -> address = $contact_request->txtAddress;		
		$contact -> email = $contact_request->txtEmail;
		$contact -> hotline = $contact_request->txtHotline;
		$contact ->save();
		return redirect()->route('admin.contact.list')->with(['flash_level'=>'success','flash_message'=>'Thêm thông tin thành công !!']);		
	}

	public function getEdit($id) {
		$contact = Contact::findOrFail($id)->toArray();
		return view('admin.contact.edit',compact('contact'));

	}
	public function postEdit(Request $request,$id)
	{	
		$this -> validate($request,["txtAddress" => "required"],["txtAddress.required" => "Vui lòng nhập địa chỉ"]);
		$this -> validate($request,["txtEmail" => "required"],["txtEmail.required" => "Vui lòng nhập Email"]);
		$this -> validate($request,["txtHotline" => "required"],["txtHotline.required" => "Vui lòng nhập Hotline"]);

		$contact =  Contact::find($id);
		$contact -> address  = $request->txtAddress;
		$contact -> email = $request->txtEmail;
		$contact -> hotline = $request->txtHotline;	
		$contact->save(); 

		return redirect()->route('admin.contact.list')->with(['flash_message'=>' Sửa thông tin thành công !!']); 
	}  

	public function getDelete($id){	
		$contact=Contact::find($id);
		$contact->delete($id);
		return redirect()->route('admin.contact.list')->with(['flash_level'=>'success','flash_message'=>' Xóa thông tin thành công !!']);
	}


	public function getList(){
		$data = Contact::OrderBy('id','DESC')->get()->toArray();
		return view('admin.contact.list',compact('data'));
	}

}
