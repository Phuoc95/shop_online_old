<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContactRequest extends Request {

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
		'txtAddress'=>'required',
		'txtEmail'=>'required',
		'txtHotline'=>'required',
		];
	}
		public function messages(){

		return [		
				
		'txtAddress.required'=>'Vui lòng nhập địa chỉ',
		'txtEmail.required'=>'Vui lòng nhập Email',
		'txtHotline.required'=>'Vui lòng nhập Hotline',
		];
	}


}
