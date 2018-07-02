<?php

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

use App\User;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/personalOrders', 'PersonalOrdersController@index');

Route::post('/personalSaveData', 'PersonalDataUpdate@update');

/*Роуты админ панели*/
Route::post('/clientsAdmin', 'Admin\ClientsController@index');
Route::post('/ordersAdmin', 'Admin\OrdersController@index');
Route::post('/couponsAdmin', 'Admin\CouponsController@index');
Route::post('/productsAdmin', 'Admin\ProductsController@index');
Route::post('/postsAdmin', 'Admin\PostsController@index');

/*'экшены админ страницы клиенты*/
Route::post('/clientsDataLiveSearch', 'Admin\ClientsController@liveSearch');
Route::post('/clientsDataLiveSearchReset', 'Admin\ClientsController@liveSearchReset');
Route::post('/deleteUsers', 'Admin\ClientsController@deleteUsers');
Route::post('/updateUsersRow', 'Admin\ClientsController@updateUsersRow');
Route::post('/updateUsers', 'Admin\ClientsController@updateUsers');