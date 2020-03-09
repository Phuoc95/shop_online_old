<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class GadgetImage extends Model {

	
	protected $table = 'gadget_images';

	protected $fillable = ['*'];

	public $timestamps = false;

	public function gadget(){

	return	$this ->belongTo('App\Gadget');
		
	}

}
