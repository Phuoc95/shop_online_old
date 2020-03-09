<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {

	protected $table = 'transactions';

	protected $fillable =['*'];
	
	public $timestamps = true;	

	public function order(){

		return	$this ->belongTo('App\Order');

	}


}
