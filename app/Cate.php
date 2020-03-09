<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model {
	protected $table = 'cates';

	protected $fillable =['*'];
	
	public $timestamps = true;

	public function product(){

		return	$this ->hasMany('App\Product');

	}

}
