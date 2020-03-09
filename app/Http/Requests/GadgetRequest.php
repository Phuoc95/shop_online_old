<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class GadgetRequest extends Request {

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
		'txtName'=>'required|unique:gadgets,name',
		'sltGadgetCate'=>'required',
		'txtTotal'=>'required',		
		'fImages'=>'required',
		'txtPrice'=>'required',
		];
	}

	public function messages(){

		return [		
		'txtName.required'=>'Vui lòng nhập vào Tên phụ kiện',
		'sltGadgetCate.required'=>'Vui lòng chọn Loại phụ kiện',
		'txtName.unique'=>'Tên phụ kiện bị trùng ',
		'txtPrice.required'=>'Vui lòng nhập vào Giá ',
		'txtTotal.required'=>'Vui lòng nhập tổng số lượng',
		'fImages.required'=>'Vui lòng tải lên ảnh',
		'fImages.image'=>'Định dạng không hổ trợ',
		];
	}

}
