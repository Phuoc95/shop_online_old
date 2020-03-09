<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class InfoRequest extends Request {

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
			'user_name'=>'required',
			'user_email'=>'required',
			'user_phone'=>'required',			
			'user_address'=>'required',			
		];
	}

	public function messages(){

		return [
			'user_name.required'=>'Vui lòng nhập  tên',
			'user_email.required'=>'Vui lòng nhập email',
			//'user_email.unique'=>'Email đã được đăng ký bởi người khác',
			'user_phone.required'=>'Vui lòng nhập số điện thoại',
			'user_address.required'=>'Vui lòng nhập địa chỉ',
			
		];
	}

}
