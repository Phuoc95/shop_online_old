<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

	protected $table = 'orders';

	protected $fillable =['*'];
	
	public $timestamps = true;
	

	public function transaction(){

		return	$this ->hasMany('App\Transaction');

	}

}
