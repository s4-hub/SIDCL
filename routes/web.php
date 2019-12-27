<?php
use App\Perusahaanbinaan;
use App\Http\Resources\DatasCollection;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auths.login');
});

Route::get('/login','AuthController@login')->name('login');	
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');

Route::group(['middleware' => ['auth','checkRole:adminwilayah']], function(){
	//route user
	Route::get('/user','UserController@index');
	Route::post('/user/create','UserController@create');
	Route::get('/user/{user}/edit','UserController@edit');
	Route::post('/user/{user}/update','UserController@update');
	Route::get('/user/{user}/destroy','UserController@delete');
	Route::get('/user/export','UserController@export');
	Route::post('/user/import','UserController@import');
	

	//route kantor
	Route::get('/kantor','KantorController@index');
	Route::post('/kantor/create','KantorController@create');
	Route::get('/kantor/{kantor}/edit','KantorController@edit');
	Route::post('/kantor/{kantor}/update','KantorController@update');
	Route::get('/kantor/{kantor}/destroy','KantorController@delete');
	Route::post('/kantor/import','KantorController@import');

	//route pembina
	Route::get('/pembina','PembinaController@index');
	Route::post('/pembina/create','PembinaController@create');
	Route::get('/pembina/{pembina}/edit','PembinaController@edit');
	Route::post('/pembina/{pembina}/update','PembinaController@update');
	Route::get('/pembina/{pembina}/destroy','PembinaController@delete');

	//route peserta
	Route::get('/perusahaanbinaan','PerusahaanbinaanController@index');
	Route::get('/perusahaanbinaan/add','PerusahaanbinaanController@add');
	Route::post('/perusahaanbinaan/create','PerusahaanbinaanController@create');
	Route::get('/perusahaanbinaan/{perusahaanbinaan}/edit','PerusahaanbinaanController@edit');
	Route::post('/perusahaanbinaan/{perusahaanbinaan}/update','PerusahaanbinaanController@update');
	Route::get('/perusahaanbinaan/{perusahaanbinaan}/destroy','PerusahaanbinaanController@delete');

	//route potensi
	Route::get('/potensi','PotensiController@index');
	Route::get('/potensi/add','PotensiController@add');
	Route::post('/potensi/create','PotensiController@create');
	Route::get('/potensi/{potensi}/edit','PotensiController@edit');
	Route::post('/potensi/{potensi}/update','PotensiController@update');
	Route::get('/potensi/{potensi}/destroy','PotensiController@delete');
	
	//route map
	Route::get('/maps','MapsController@index');

	//route json
	// Route::get('/api/Perusahaanbinaan', function(){
	// 	$data = Perusahaanbinaan::all();
	// 	return new DatasCollection($data);
	// });

	//Route::get('/json', 'PerusahaanController@index');
	

});

Route::group(['middleware' => ['auth','checkRole:adminwilayah,admincabang,pembina']], function(){
	Route::get('/dashboard','DashboardController@index');
});

