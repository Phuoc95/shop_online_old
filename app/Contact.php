<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model {

	protected $table = 'contacts';
	protected $fillable =['*'];	
	public $timestamps = false;

}
