<?php


Route::get('/',['uses'=>'SmartStoreController@index']);
// Route::get('/',['uses'=>'HomeController@index']);

Auth::routes();

Route::get('/home', 'SmartStoreController@index');

//Route::resource('login','LoginController');


Route::get('/home/login',['as'=>'getLogin','uses'=>'LoginController@getLogin']);
Route::post('/home/login',['as'=>'postLogin','uses'=>'LoginController@postLogin']);


Route::get('home/logout', function() {
    Auth::logout();
    return redirect('/home');
});

Route::resource('register','RegisterController');

Route::resource('dienthoai','DienThoaiController');

Route::get('/home/buy/{id}', ['as'=>'buy' , 'uses'=>'SmartStoreController@buy']);
Route::get('/home/shopping', ['as'=>'shopping' , 'uses'=>'SmartStoreController@shopping']);
Route::get('/home/delete/{id}', ['as'=>'delete' , 'uses'=>'SmartStoreController@delete']);
Route::get('/home/update/{id}/{qty}', ['as'=>'update' , 'uses'=>'SmartStoreController@update']);

Route::get('/shopping/check-out',['as'=>'shopping.getCheckOut', 'uses'=>'SmartStoreController@getCheckOut']);
Route::post('/shopping/post-check-out',['as'=>'shopping.postCheckOut', 'uses'=>'SmartStoreController@postCheckOut']);

// Route search
Route::get('/dien-thoai/apple', ['as'=>'home.apple' , 'uses'=>'SmartStoreController@getApple']);
Route::get('/dien-thoai/samsung', ['as'=>'home.samsung' , 'uses'=>'SmartStoreController@getSamsung']);
Route::get('/dien-thoai/sony', ['as'=>'home.sony' , 'uses'=>'SmartStoreController@getSony']);
Route::post('/home/search', ['as'=>'home.search' , 'uses'=>'SmartStoreController@searchHome']);
Route::get('/home/hang-san-xuat/{id}', ['as'=>'home.hang-san-xuat' , 'uses'=>'SmartStoreController@searchByNSX']);
Route::get('/home/muc-gia/{gia_duoi}/{gia_tren}', ['as'=>'home.gia' , 'uses'=>'SmartStoreController@searchByPrice']);
//End route search

Route::post('/dien-thoai/{id}/comment',['as'=>'home.dien-thoai.comment', 'uses'=>'BinhLuanController@postComment']);

// Route Admin
Route::get('/login',['as'=>'getAdminLogin','uses'=>'LoginController@getAdminLogin']);
Route::post('/login/check',['as'=>'postAdminLogin','uses'=>'LoginController@postAdminLogin']);

Route::get('/logout',['as'=>'logout', function(){
	Auth::logout();
    return redirect('/login');
}]);

Route::group(['middleware'=>'auth', 'middleware' => 'admin'],function(){
	Route::group(['prefix'=>'ploc1411_admin'], function(){
		Route::get('/', function() {
		    return view('admin.index');
		});

		Route::group(['prefix'=>'hang-san-xuat'], function(){
			Route::get('add',['as'=>'admin.hang-san-xuat.getAdd', 'uses'=>'HangSanXuatController@getAdd']);
			Route::post('post-add',['as'=>'admin.hang-san-xuat.postAdd', 'uses'=>'HangSanXuatController@postAdd']);
			Route::get('list',['as'=>'admin.hang-san-xuat.getList', 'uses'=>'HangSanXuatController@getList']);
			Route::get('update/{id}',['as'=>'admin.hang-san-xuat.getUpdate', 'uses'=>'HangSanXuatController@getUpdate']);
			Route::post('post-update',['as'=>'admin.hang-san-xuat.postUpdate', 'uses'=>'HangSanXuatController@postUpdate']);
			Route::post('delete/{id}',['as'=>'admin.hang-san-xuat.delete', 'uses'=>'HangSanXuatController@delete']);
		});

		Route::group(['prefix'=>'dien-thoai'], function(){
			Route::get('add',['as'=>'admin.dien-thoai.getAdd', 'uses'=>'DienThoaiController@create']);
			Route::post('post-add',['as'=>'admin.dien-thoai.postAdd', 'uses'=>'DienThoaiController@store']);
			Route::get('list',['as'=>'admin.dien-thoai.getList', 'uses'=>'DienThoaiController@getList']);
			Route::get('new-list',['as'=>'admin.dien-thoai.getNewList', 'uses'=>'DienThoaiController@getNewList']);
			Route::get('list/het-hang',['as'=>'admin.dien-thoai.getHetHang', 'uses'=>'DienThoaiController@getHetHang']);
			Route::get('list/da-ban',['as'=>'admin.dien-thoai.getDaBan', 'uses'=>'DienThoaiController@getDaBan']);
			Route::post('delete/{id}',['as'=>'admin.dien-thoai.delete', 'uses'=>'DienThoaiController@delete']);
			Route::get('update/{id}',['as'=>'admin.dien-thoai.getUpdate', 'uses'=>'DienThoaiController@getUpdate']);
			Route::post('update',['as'=>'admin.dien-thoai.postUpdate', 'uses'=>'DienThoaiController@postUpdate']);
			Route::get('update/delete-img/{id_hinh}', ['as'=>'admin.dien-thoai.deleteImg', 'uses'=>'DienThoaiController@deleteImg']);

		});

		Route::group(['prefix'=>'chi-tiet-dien-thoai'], function(){
			Route::get('add/{id_dt}',['as'=>'admin.chi-tiet-dien-thoai.getAdd', 'uses'=>'ChiTietDienThoaiController@getAdd']);
			Route::post('add',['as'=>'admin.chi-tiet-dien-thoai.postAdd', 'uses'=>'ChiTietDienThoaiController@postAdd']);
			Route::get('update/{id_dt}',['as'=>'admin.chi-tiet-dien-thoai.getUpdate', 'uses'=>'ChiTietDienThoaiController@getUpdate']);
			Route::post('update',['as'=>'admin.chi-tiet-dien-thoai.postUpdate', 'uses'=>'ChiTietDienThoaiController@postUpdate']);
			Route::get('cancel/{id_dt}',['as'=>'admin.chi-tiet-dien-thoai.cancel', 'uses'=>'ChiTietDienThoaiController@cancel']);
		});

		Route::group(['prefix'=>'don-dat-hang'], function(){
			Route::get('list',['as'=>'admin.don-dat-hang.getList', 'uses'=>'PhieuDatHangController@getList']);
			Route::get('ok-list',['as'=>'admin.don-dat-hang.getOkList', 'uses'=>'PhieuDatHangController@getOkList']);
			Route::get('detail/{id}',['as'=>'admin.don-dat-hang.getDetail', 'uses'=>'PhieuDatHangController@getDetail']);
			Route::post('check-detail',['as'=>'admin.don-dat-hang.checkDetail', 'uses'=>'PhieuDatHangController@checkDetail']);
			Route::get('delete/{id}',['as'=>'admin.don-dat-hang.delete', 'uses'=>'PhieuDatHangController@delete']);
		});

		Route::group(['prefix'=>'users'], function(){
			Route::get('list',['as'=>'admin.users.getList', 'uses'=>'NguoiDungController@getList']);
			Route::get('new-list',['as'=>'admin.users.getNewList', 'uses'=>'NguoiDungController@getNewList']);
			Route::post('delete/{id}',['as'=>'admin.users.delete', 'uses'=>'NguoiDungController@delete']);
			Route::get('add',['as'=>'admin.users.getAdd', 'uses'=>'NguoiDungController@getAdd']);
			Route::post('post-add',['as'=>'admin.users.postAdd', 'uses'=>'NguoiDungController@postAdd']);
			Route::get('update/{id}',['as'=>'admin.users.getUpdate', 'uses'=>'NguoiDungController@getUpdate']);
			Route::post('update',['as'=>'admin.users.postUpdate', 'uses'=>'NguoiDungController@postUpdate']);
		});

		Route::group(['prefix'=>'quang-cao'], function(){
			Route::get('list',['as'=>'admin.quang-cao.getList', 'uses'=>'QuangCaoController@getList']);
			Route::get('add',['as'=>'admin.quang-cao.getAdd', 'uses'=>'QuangCaoController@getAdd']);
			Route::post('post-add',['as'=>'admin.quang-cao.postAdd', 'uses'=>'QuangCaoController@postAdd']);
			Route::post('delete/{id}',['as'=>'admin.quang-cao.delete', 'uses'=>'QuangCaoController@delete']);
			Route::get('update/{id}',['as'=>'admin.quang-cao.getUpdate', 'uses'=>'QuangCaoController@getUpdate']);
			Route::post('update',['as'=>'admin.quang-cao.postUpdate', 'uses'=>'QuangCaoController@postUpdate']);
		});
	});
});

// End Route Admin

Route::get('test', function() {
   return route('getAdminLogin')->with('test-roue');   
});

