<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
		'txtName'=>'required', 
		'txtUsername'=>'required|unique:users,username', 
		'txtPassword'=>'required',
		'txtRePass'=>'required',
		'txtRePass'=>'required|same:txtPassword',
		'txtEmail'=>'required',
		/*	'txtEmail'=>'required|unique:users,email|regex:/^[a-z][a-z0-9]*(_[a-z0-9]+)*(\.[a-z0-9])*@[a-z0-9]([a-z0-9-][a-z0-9]+)*(\.[a-z]{2,4}){1,2}$/',*/
		'txtAddress'=>'required  ',
		'txtPhone'=>'required  ',		
		
		];
	}
	public function messages()
	{
		return [
		  'txtName.required'=>'Vui lòng nhập Họ tên',
          'txtUsername.required'=>'Vui lòng nhập Tên đăng nhập',
          'txtUsername.unique'=>'Tên đăng nhập đã tồn tại',
          'txtPassword.required'=>'Vui lòng nhập mật khẩu',
          'txtRePass.required'=>'Vui lòng xác nhận mật khẩu',
          'txtRePass.same'=>'Mật khẩu không khớp',
          'txtEmail.unique'=>'Email đã được đăng ký bởi người khác ',
          'txtEmail.required'=>'Vui lòng nhập vào Email',
         // 'txtEmail.regex'=>'Định dạng email không chính xác',
          'txtAddress.required'=>'Vui lòng nhập vào Địa chỉ',
          'txtPhone.required'=>'Vui lòng nhập vào Số điện thoại'
		];
	}
}
