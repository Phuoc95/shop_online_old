<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model {

	protected $table = 'admins';

	protected $fillable =['*'];
	
	public $timestamps = true;
	protected $hidden = ['password', 'remember_token'];

	public function product(){

		return	$this ->hasMany('App\Product');

	}
	public function gadget(){

		return	$this ->hasMany('App\Gadget');

	}

}
