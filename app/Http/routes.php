<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	]);

Route::get('test','WelcomeController@chitietsanpham');
/*Route::get('register',function(){
	return view('login.register');
});*/
Route::get('register',['as'=>'getRegister','uses'=>'UserController@getRegister']); 
Route::post('register',['as'=>'postRegister','uses'=>'UserController@postRegister']); 





Route::group(['prefix'=>'admin','middleware'=>'adminlogin'],function(){ 
	// group cate 
	Route::group(['prefix'=>'cate','middleware'=>'khoaccess'],function(){
		Route::get('list',['as'=>'admin.cate.list','uses'=>'cateController@getlist']);

		Route::get('add',['as'=>'admin.cate.getAdd','uses'=>'cateController@getAdd']);
		Route::post('add',['as'=>'admin.cate.postAdd','uses'=>'cateController@postAdd']);

		Route::get('delete/{id}',['as'=>'admin.cate.getDelete','uses'=>'cateController@getDelete']);


		Route::get('edit/{id}',['as'=>'admin.cate.getEdit','uses'=>'cateController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.cate.postEdit','uses'=>'cateController@postEdit']);          
	});
	// group product 
	Route::group(['prefix' =>'product','middleware'=>'khoaccess'],function(){
		Route::get('list',['as'=>'admin.product.list','uses'=>'productController@getlist']);

		Route::get('add',['as'=>'admin.product.getAdd','uses'=>'productController@getAdd']);
		Route::post('add',['as'=>'admin.product.postAdd','uses'=>'productController@postAdd']);

		Route::get('delete/{id}',['as'=>'admin.product.getDelete','uses'=>'productController@getDelete']);

		Route::get('edit/{id}',['as'=>'admin.product.getEdit','uses'=>'productController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.product.postEdit','uses'=>'productController@postEdit']); 

		Route::get('delimg/{id}',['as'=>'admin.product.getDelImg','uses'=>'AjaxController@getDelImg']);     
	});
	// grooup gadgetcate 
	Route::group(['prefix'=>'gadgetcate','middleware'=>'khoaccess'],function(){
		Route::get('list',['as'=>'admin.gadgetcate.list','uses'=>'GadgetCateController@getlist']);

		Route::get('add',['as'=>'admin.gadgetcate.getAdd','uses'=>'GadgetCateController@getAdd']);
		Route::post('add',['as'=>'admin.gadgetcate.postAdd','uses'=>'GadgetCateController@postAdd']);

		Route::get('delete/{id}',['as'=>'admin.gadgetcate.getDelete','uses'=>'GadgetCateController@getDelete']);


		Route::get('edit/{id}',['as'=>'admin.gadgetcate.getEdit','uses'=>'GadgetCateController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.gadgetcate.postEdit','uses'=>'GadgetCateController@postEdit']);          
	});

   // group gadget
	Route::group(['prefix' =>'gadget','middleware'=>'khoaccess'],function(){
		Route::get('list',['as'=>'admin.gadget.list','uses'=>'GadgetController@getlist']);

		Route::get('add',['as'=>'admin.gadget.getAdd','uses'=>'GadgetController@getAdd']);
		Route::post('add',['as'=>'admin.gadget.postAdd','uses'=>'GadgetController@postAdd']);

		Route::get('delete/{id}',['as'=>'admin.gadget.getDelete','uses'=>'GadgetController@getDelete']);

		Route::get('edit/{id}',['as'=>'admin.gadget.getEdit','uses'=>'GadgetController@getEdit']);               
		Route::post('edit/{id}',['as'=>'admin.gadget.postEdit','uses'=>'GadgetController@postEdit']); 

		Route::get('delgimg/{id}',['as'=>'admin.gadget.getDelGImg','uses'=>'AjaxController@getDelGImg']);     
	});

  // group slide
	Route::group(['prefix' =>'slide','middleware'=>'kinhdoanhaccess'],function(){
		Route::get('list',['as'=>'admin.slide.list','uses'=>'SlideController@getlist']);

		Route::get('add',['as'=>'admin.slide.getAdd','uses'=>'SlideController@getAdd']);
		Route::post('add',['as'=>'admin.slide.postAdd','uses'=>'SlideController@postAdd']);

		Route::get('delete/{id}',['as'=>'admin.slide.getDelete','uses'=>'SlideController@getDelete']);

		Route::get('edit/{id}',['as'=>'admin.slide.getEdit','uses'=>'SlideController@getEdit']);               
		Route::post('edit/{id}',['as'=>'admin.slide.postEdit','uses'=>'SlideController@postEdit']); 
	});

	  // group contactContactController
	Route::group(['prefix' =>'contact'],function(){
		Route::get('list',['as'=>'admin.contact.list','uses'=>'ContactController@getlist']);

		Route::get('add',['as'=>'admin.contact.getAdd','uses'=>'ContactController@getAdd']);
		Route::post('add',['as'=>'admin.contact.postAdd','uses'=>'ContactController@postAdd']);

		Route::get('delete/{id}',['as'=>'admin.contact.getDelete','uses'=>'ContactController@getDelete']);

		Route::get('edit/{id}',['as'=>'admin.contact.getEdit','uses'=>'ContactController@getEdit']);               
		Route::post('edit/{id}',['as'=>'admin.contact.postEdit','uses'=>'ContactController@postEdit']); 
	});

	// group user
	Route::group(['prefix' =>'user'],function(){
		Route::get('list',['as'=>'admin.user.list','uses'=>'UserController@getlist']);

		Route::get('add',['as'=>'admin.user.getAdd','uses'=>'UserController@getAdd']);
		Route::post('add',['as'=>'admin.user.postAdd','uses'=>'UserController@postAdd']);

		Route::get('delete/{id}',['as'=>'admin.user.getDelete','uses'=>'UserController@getDelete']);

		Route::get('edit/{id}',['as'=>'admin.user.getEdit','uses'=>'UserController@getEdit']);               
		Route::post('edit/{id}',['as'=>'admin.user.postEdit','uses'=>'UserController@postEdit']); 

		/*Route::get('Login',['as'=>'admin.user.login','uses'=>'Auth\AuthController@getLogin']);     */
	});

	// group admin
	Route::group(['prefix' =>'admin'],function(){
		Route::get('list',['as'=>'admin.admin.list','uses'=>'AdminController@getlist']);

		Route::get('add',['as'=>'admin.admin.getAdd','uses'=>'AdminController@getAdd']);
		Route::post('add',['as'=>'admin.admin.postAdd','uses'=>'AdminController@postAdd']);

		Route::get('delete/{id}',['as'=>'admin.admin.getDelete','uses'=>'AdminController@getDelete']);

		Route::get('edit/{id}',['as'=>'admin.admin.getEdit','uses'=>'AdminController@getEdit']);               
		Route::post('edit/{id}',['as'=>'admin.admin.postEdit','uses'=>'AdminController@postEdit']); 

		/*Route::get('Login',['as'=>'admin.user.login','uses'=>'Auth\AuthController@getLogin']);     */
	});

	//group transaction
		Route::group(['prefix' =>'transaction','middleware'=>'kinhdoanhaccess'],function(){
			Route::get('list',['as'=>'admin.transaction.list','uses'=>'TransactionController@getlist']);

			//Route::get('add',['as'=>'admin.transaction.getAdd','uses'=>'TransactionController@getAdd']);
			//Route::post('add',['as'=>'admin.transaction.postAdd','uses'=>'TransactionController@postAdd']);

			Route::get('delete/{id}',['as'=>'admin.transaction.getDelete','uses'=>'TransactionController@getDelete']);

			Route::get('edit/{id}',['as'=>'admin.transaction.getEdit','uses'=>'TransactionController@getEdit']);
			Route::post('edit/{id}',['as'=>'admin.transaction.postEdit','uses'=>'TransactionController@postEdit']); 
			Route::get('receipt/{id}',['as'=>'admin.transaction.receipt','uses'=>'TransactionController@receipt']);
			

		/*Route::get('Login',['as'=>'admin.user.login','uses'=>'Auth\AuthController@getLogin']);     */
	});

		//group order
		Route::group(['prefix' =>'order','middleware'=>'kinhdoanhaccess'],function(){
			Route::get('list',['as'=>'admin.order.list','uses'=>'OrderController@getlist']);

			//Route::get('add',['as'=>'admin.order.getAdd','uses'=>'OrderController@getAdd']);
			Route::post('add',['as'=>'admin.order.postAdd','uses'=>'OrderController@postAdd']);

			Route::get('delete/{id}',['as'=>'admin.order.getDelete','uses'=>'OrderController@getDelete']);

			Route::get('edit/{id}',['as'=>'admin.order.getEdit','uses'=>'OrderController@getEdit']);               
			Route::post('edit/{id}',['as'=>'admin.order.postEdit','uses'=>'OrderController@postEdit']); 

		/*Route::get('Login',['as'=>'admin.user.login','uses'=>'Auth\AuthController@getLogin']);     */
		});
	
});

	/*	// group admin
		Route::group(['prefix' =>'login'],function(){	
			Route::get('admin-login',['as'=>'login.admin-login','uses'=>'Auth\AuthController@getAdminLogin']);   	
			Route::post('admin-login',['as'=>'login.admin-login','uses'=>'Auth\AuthController@postAdminLogin']);  

			Route::get('user-login',['as'=>'login.user-login','uses'=>'Auth\AuthController@getUserLogin']);
			Route::post('user-login',['as'=>'login.user-login','uses'=>'Auth\AuthController@postUserLogin']);  
		});
	*/

Route::get('checkout',function() {
	return view('user.pages.checkou');
} );


Route::get('loai-san-pham/{id}/{tenloai}',['as'=>'loaisanpham','uses'=>'WelcomeController@loaisanpham'] );
Route::get('loai-phu-kien/{id}/{tenloai}',['as'=>'loaiphukien','uses'=>'WelcomeController@loaiphukien'] );

Route::get('chi-tiet-san-pham/{id}/{tensp}',['as'=>'chitietsanpham','uses'=>'WelcomeController@chitietsanpham'] );
Route::get('chi-tiet-phu-kien/{id}/{tenpk}',['as'=>'chitietphukien','uses'=>'WelcomeController@chitietphukien'] );


Route::post('tim-kiem',['as'=>'timkiem','uses'=>'WelcomeController@timkiem']);
Route::get('autocomplete',['as'=>'autocomplete','uses'=>'AjaxControler@autocomplete']);

Route::get('thanh-vien',['as'=>'thanhvien','middleware'=>'auth','uses'=>'WelcomeController@thanhvien']);
Route::get('mua-hang/{id}/{tensanpham}',['as'=>'muahang','uses'=>'WelcomeController@muahang']);
Route::get('mua-phu-kien/{id}/{tenphukien}',['as'=>'muaphukien','uses'=>'WelcomeController@muaphukien']);
Route::get('gio-hang',['as'=>'giohang','uses'=>'WelcomeController@giohang']);
//Route::get('dat-hang',['as'=>'dathang','uses'=>'WelcomeController@dathang']);
Route::get('xoa-san-pham/{id}',['as'=>'xoasanpham','uses'=>'WelcomeController@xoasanpham']);
Route::get('cap-nhat/{id}/{qty}',['as'=>'capnhat','uses'=>'AjaxController@capnhat']);

//Dat Hang
Route::post('dat-hang',['as'=>'dathang','uses'=>'UserOrderController@dathang']);
Route::get('thanh-toan',['as'=>'thanhtoan','uses'=>'UserOrderController@thanhtoan']);
Route::get('thanh-toanr/{transaction_id}/{Tamount2}/',['as'=>'thanhtoanr','uses'=>'UserOrderController@thanhtoanr']);
Route::get('paid/{id}',['as'=>'paid','uses'=>'UserOrderController@paid']);
//thay doi thong tin ca nhan
Route::post('doi-thong-tin',['as'=>'doithongtin','uses'=>'WelcomeController@doithongtin']);
Route::post('doi-mat-khau',['as'=>'doimatkhau','uses'=>'WelcomeController@doimatkhau']);


Route::get('lien-he',['as'=>'getLienhe','uses'=>'WelcomeController@getLienhe']);
Route::post('lien-he',['as'=>'postLienhe','uses'=>'WelcomeController@postLienhe']);

/*Route::get('gio-hang',['as'=>'giohang','uses'=>'WelcomeController@giohang']);*/
/*Route::get('checkout',['as'=>'checkout','uses'=>'WelcomeController@checkout']);*/
//Route::get('thanh-toan',['as'=>'thanhtoan','uses'=>'WelcomeController@thanhtoan']);



Route::get('dashboard',['as'=>'dashboard','uses'=>'WelcomeController@dashboard']);
