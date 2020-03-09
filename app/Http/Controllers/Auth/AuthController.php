<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use Auth;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}
	
	//protected $redirectPath = '/admin/admin/list';

	public function getLogin(){
		return view('login.login'); 
	}
	public function postLogin(LoginRequest $request){
		$user = array(
			'username' => $request->Username,
			'password' => $request->Password,
			//'level' => 1,  //
			);
		if($this->auth->attempt($user)){
		
			return redirect('http://localhost:8000')->with(['flash_level'=>'success','flash_message'=>' Đăng Nhập 
			thành công !!']);
			
			
			// echo "<script >";
			// echo "alert('Đăng nhập thành công')";
			// echo "</script>";
		}

		else
			return redirect() -> back();
	}
/*
	public function getRegister(){
		return view('login.register'); 
	}

	public function postRegister(UserRequest $request){
		$user = new User;
		$user -> name = $request -> txtName;
		$user -> username = $request -> txtUsername;
		$user -> password = Hash::make($request ->txtPassword);
		$user -> email = $request -> txtEmail;
		$user -> remember_token = $request -> _token;
		$user -> address = $request -> txtAddress;
		$user -> phone = $request -> txtPhone;
		$user -> level = 1;
		
		$user ->save();
		return redirect()-> url('/');
	}
*/


}
