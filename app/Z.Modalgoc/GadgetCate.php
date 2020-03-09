<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class GadgetCate extends Model {

	protected $table = 'gadget_cates';

	protected $fillable =['*'];
	
	public $timestamps = true;

	public function product(){

		return	$this ->hasMany('App\Gadget');

	}

}
