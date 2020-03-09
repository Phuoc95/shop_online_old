<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\User;
use Hash;
use Auth;
use Input;

class AdminController extends Controller {

	public function getAdd(){

	 	if(  (Auth::user()->id != 1)   )
	    {	
        	return redirect()->route('admin.admin.list')->with(['flash_level'=>'danger','flash_message' 
        		=>'Bạn không được phép thêm ! ']);
        }

		return view('admin.admin.add');
	}
	public function postAdd(AdminRequest $request){
		$admin = new User;
		$admin -> name = $request -> txtName;
		$admin -> username = $request -> txtUsername;
		$admin -> password = Hash::make($request ->txtPassword);
		$admin -> email = $request -> txtEmail;
		$admin -> level = $request -> sltLevel;
		$admin -> remember_token = $request -> _token;
		$admin ->save();
		return redirect()-> route('admin.admin.list')->with(['flash_message' =>'Thêm thành viên thành công']);
	}

	public function getList()
	{
		$admin = User::where('level','<>',1)->orderBy('id','ASC')->get()->toArray();
		return view('admin.admin.list',compact('admin'));
	}

	public function getDelete($id){
		$user_current_login = Auth::user()->id;
		$user = User::find($id);
		if(($user['level'] == 2) || ($user['level'] == 3  && $user_current_login != 1) 
		|| ($user['level'] == 4  && $user_current_login != 1) || ($user['level'] == 5  && $user_current_login != 1)      )
		// Dau && (mean:ma) 	Ma ko phai root(Dua theo ID dang dang nhap de biet phai la root ko)	
		// 						Thi cung ko dc quyen xoa	
		{
			return redirect()->route('admin.admin.list')->with(['flash_level'=>'danger','flash_message' =>'Bạn không thể xóa !!! ']);
		}

		else
		{	$user->delete($id);
			return redirect()->route('admin.admin.list')->with(['flash_message'=>' Xóa  thành công !!','flash_level'=>'success']);
		}	
	
}

public function getEdit($id){
		$user = User::find($id)->toArray();
	 	if(  (Auth::user()->id != 1) && (  $id == 1 || ($user['level'] == 3 && (Auth::user()->id != $id)) || ($user['level'] == 4  && (Auth::user()->id != $id)) || ($user['level'] == 5  && (Auth::user()->id != $id)) )   )
	    {	
        	return redirect()->route('admin.admin.list')->with(['flash_level'=>'danger','flash_message' 
        		=>'Bạn không được phép sửa ! ']);
        }
		return view('admin.admin.edit',compact('user','id'));
/*
$user = User::find($id)->toArray();
return view('admin.admin.edit',compact('user'));*/

}



public function postEdit($id ,Request $request){
	$user = User::find($id);
	$this->validate($request,['txtName'=>'required'],['txtName.required'=>'Vui lòng nhập Họ tên'] );
	$this->validate($request,['txtUsername'=>'required'],['txtUsername.required'=>'Vui lòng nhập Tên đăng nhập']);
	$this->validate($request,['txtUsername'=>'unique:users,username,'.$id],['txtUsername.unique'=>'Tên đăng nhập đã tồn tại'] );

	$this->validate($request,['txtEmail'=>'required'],['txtEmail.required'=>'Vui lòng nhập Email']);
	$this->validate($request,['txtEmail'=>'unique:users,email,'.$id],['txtEmail.unique'=>'Email đã tồn tại'] );

	$this->validate($request,['sltLevel'=>'required'],['sltLevel.required'=>'Vui lòng chọn cấp độ']);

		if($request->txtPassword) 			//Neu txtPass co nhap vao
		{
			$this->validate($request,[
			'txtRePass'=>'same:txtPassword'		 //	Thi ktra Pass phai giong nhau
			],[
			'txtRePass.same'=> 'Mật khẩu không giống nhau '   
			]);
			$pass = $request->txtPassword;
			$user->password = Hash::make($pass);
		}
		$user-> name = $request->txtName;
		$user-> username = $request->txtUsername;
		$user-> email = $request->txtEmail;
		$user -> level = $request -> sltLevel;
		$user-> remember_token = $request->input('_token');
		$user->save();
		return redirect()->route('admin.admin.list')->with(['flash_message' =>'Sửa  thông tin thành công','flash_level'=>'success']);

	}

}

