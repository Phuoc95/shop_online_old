<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request {

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
			'sltCate'=>'required',
			'txtName'=>'required|unique:products,name',
			'txtTotal'=>'required',			
			'fImages'=>'required',
			'txtPrice'=>'required',
		];
	}

	public function messages(){

		return [
			'sltCate.required'=>'Vui lòng chọn Danh Mục Sản Phẩm',
			'txtName.required'=>'Vui lòng nhập Tên Sản Phẩm',
			'txtName.unique'=>'Tên Sản Phẩm bị trùng ',
			'txtTotal.required'=>'Vui lòng nhập tổng số lượng',
			'txtPrice.required'=>'Vui lòng nhập  Giá Sản Phẩm',
			'fImages.required'=>'Vui lòng tải lên ảnh',
			//'fImages.image'=>'Định dạng không hổ trợ',
		];
	}

}
