<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Gadget extends Model {


	protected $table = 'gadgets';

	protected $fillable =['*'];

	public $timestamps = true;

	public function gadgetcate(){

		return	$this ->belongTo('App\GadgetCate');				
	}
	public function gadget(){

		return	$this ->belongto('App\User');
	}
	public function gimage(){
		return	$this ->hasMany('App\GadgetImage');		
	}


}
