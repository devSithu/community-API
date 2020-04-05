<?php
use App\Models\User;
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

Route::get('/', 'User\RegisterController@loginPage');

//Register
Route::get('/userLogin','User\RegisterController@loginPage'); 
Route::post('/userLogin','User\RegisterController@login'); 

Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/userRegister','User\RegisterController@registerPage'); 
    Route::post('/userRegister','User\RegisterController@userRegister'); 
    Route::get('/userLogout','User\RegisterController@logout');  
    Route::get('/application','HomeController@index');
    
    //admin
    Route::get('/adminList','AdminController@adminList'); 
    Route::get('delete/{id}','AdminController@deleteAdminAccount'); 
    Route::get('updatePage/{id}','AdminController@updatePage');
    Route::post('update/{id}','AdminController@update'); 
    
    //bill payment
    Route::get('/home','BillPayController@billPayList'); 

    Route::get('/payPerson/{loginId}', 'BillPayController@payPerson')->name('BillPayController#payperson'); 

    Route::post('/payBill','BillPayController@payPersonBill');

});
 

