<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use Hash;
use Auth;
use Input;

class UserController extends Controller {

	public function getRegister(){
		return view('login.register');
	}
	public function postRegister(UserRequest $request){
		$user = new User;
		$user -> name = $request -> txtName;
		$user -> username = $request -> txtUsername;
		$user -> password = Hash::make($request ->txtPassword);
		$user -> email = $request -> txtEmail;
		$user -> remember_token = $request -> _token;
		$user -> address = $request -> txtAddress;
		$user -> phone = $request -> txtPhone;
		$user -> level = 1;	
		$user ->save();
		return redirect()-> route('thanhvien')->with(['flash_message' =>'Đăng ký thành công']);
		
	}

	public function getAdd(){
		return view('admin.user.add');
	}
	public function postAdd(UserRequest $request){
		$user = new User;
		$user -> name = $request -> txtName;
		$user -> username = $request -> txtUsername;
		$user -> password = Hash::make($request ->txtPassword);
		$user -> email = $request -> txtEmail;
		$user -> remember_token = $request -> _token;
		$user -> address = $request -> txtAddress;
		$user -> phone = $request -> txtPhone;
		$user -> level = 1;
		$user ->save();
		return redirect()-> route('admin.user.list')->with(['flash_message' =>'Thêm thành viên thành công']);
	}

	public function getList()
	{
		$user = User::where('level',1)->orderBy('id','ASC')->get()->toArray();
		return view('admin.user.list',compact('user'));
	}

	public function getDelete($id){
	$user = User::find($id);			
	$user->delete($id);
	return redirect()->route('admin.user.list')->with(['flash_message'=>' Xóa thành viên  thành công !!','flash_level'=>'success']);

	}

public function getEdit($id){
	/*		$user = User::find($id);

	if(  (Auth::user()->id != 1) && (  $id == 1 || ($user['level'] == 1 && (Auth::user()->id != $id)) )   )

	//HOAC if(  (Auth::user()->id != 1) && (  $id == 1 || (Auth::user()->id != $id))   )
	//  	Neu la ad thuong	 Mà  Sửa superAd	Sửa ko phải là chính mình
	//  	           (Khi CLick vao sửa supper ad sẽ Get dc  id =1)

	{	
	return redirect()->route('admin.user.list')->with(['flash_level'=>'danger','flash_message' 
	=>'Bạn không được phép sửa user này']);
	}
	return view('admin.user.edit',compact('user','id'));*/
	$user = User::find($id)->toArray();
	return view('admin.user.edit',compact('user'));

	}



public function postEdit($id ,Request $request){
	$user = User::find($id);
	$this->validate($request,['txtUsername'=>'unique:users,username,'.$id],['txtUsername.unique'=>'Tên đăng nhập đã tồn tại'] );
	$this->validate($request,['txtName'=>'required'],['txtName.required'=>'Vui lòng nhập Họ tên'] );
	$this->validate($request,['txtUsername'=>'required'],['txtUsername.required'=>'Vui lòng nhập Tên đăng nhập']);
	$this->validate($request,['txtEmail'=>'required'],['txtEmail.required'=>'Vui lòng nhập Email']);
	$this->validate($request,['txtEmail'=>'unique:users,email,'.$id],['txtEmail.unique'=>'Email đã tồn tại'] );
	// $this->validate($request,['sltLevel'=>'required'],['sltLevel.required'=>'Vui lòng chọn cấp độ']);

	$user = User::find($id);

		if($request->txtPassword) 			//Neu txtPass co nhap vao
		{
			$this->validate($request, ['txtRePass'=>'required'],
									  ['txtRePass.required'=> 'Nhập xác nhận mật khẩu' ] );
			$this->validate($request, ['txtRePass'=>'same:txtPassword'],
									  ['txtRePass.same'=> 'Mật khẩu không giống nhau' ]);
	
			$pass = $request->txtPassword;
			$user->password = Hash::make($pass);
		}
		$user-> name = $request->txtName;
		$user-> username = $request->txtUsername;
		$user-> email = $request->txtEmail;
		$user-> remember_token = $request->input('_token');
		$user -> address = $request -> txtAddress;
		$user -> phone = $request -> phone;
		$user->save();
		return redirect()->route('admin.user.list')->with(['flash_message' =>'Sửa User thành công','flash_level'=>'success']);

	}

}

