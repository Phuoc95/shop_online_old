<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SlideRequest extends Request {

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
		'txtName'=>'required|unique:slides,name',	
		'fImages'=>'required|image',
		];
	}

	public function messages(){

		return [		
		'txtName.required'=>'Vui lòng nhập Tên Slide',
		'txtName.unique'=>'Tên bị trùng ',		
		'fImages.required'=>'Vui lòng tải lên ảnh',
		'fImages.image'=>'Định dạng không hổ trợ',
		];
	}

}
