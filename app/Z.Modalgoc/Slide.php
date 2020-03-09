<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model {

	protected $table = 'slides';

	protected $fillable =['*'];
	
	public $timestamps = true;


	public function slide(){

		return	$this ->belongTo('App\User');

	}

}
