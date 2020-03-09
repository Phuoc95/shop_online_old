<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminRequest extends Request {

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
		'txtPassword'=>'required  ',
		'txtRePass'=>'required|same:txtPassword',
		'txtEmail'=>'required|unique:users,email|regex:/^[a-z][a-z0-9]*(_[a-z0-9]+)*(\.[a-z0-9])*@[a-z0-9]([a-z0-9-][a-z0-9]+)*(\.[a-z]{2,4}){1,2}$/',
		'sltLevel'=>'required',
		//'terms'=>'required',			
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
		'txtEmail.regex'=>'Định dạng email không chính xác',
		'sltLevel.required'=>'Vui lòng chọn cấp độ',
		//'terms.required'=>'Bạn phải đồng ý các điều khoản !'

		];
	}
}
