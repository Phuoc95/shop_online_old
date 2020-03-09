<?php namespace App\Http\Middleware;

use Closure;
use Auth;

class KhoMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		
		if(Auth::check()){
			$user = Auth::user();
					// echo "<pre>";
					// print_r ($user);
					// echo "</pre>";
					// die();
			
			if(($user->level ==2) || ($user->level ==4) ){
				// return $next($request);
				// return redirect()->route('admin.product.list')->with(['flash_level'=>'success','flash_message'=>'Thêm Sản Phẩm thành công !!']);
				
				return $next($request);
				

			}else{		
				return redirect()->route('admin.admin.list')	;
			}
		}
		return redirect('auth/login')	;
	}

}
