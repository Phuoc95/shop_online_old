<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class GadgetCateRequest extends Request {

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
			
			'txtGadgetCateName' => 'required|unique:gadget_cates,name'
		];
	}

	
	public function  messages(){
		
		return[
			'txtGadgetCateName.required' =>'Vui lòng nhập vào tên ',
			'txtGadgetCateName.unique' =>' Tên bị trùng' 

		];

	}

}
