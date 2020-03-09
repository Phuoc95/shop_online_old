<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $table = 'products';

	protected $fillable = ['*'];

	public $timestamps = true;
	
	public function cate(){

		return	$this ->belongTo('App\Cate');				
	}

	public function admin(){
		return	$this ->belongTo('App\User');
	}

	public function pimage(){
		return	$this ->hasMany('App\ProductImage');		
	}

}
