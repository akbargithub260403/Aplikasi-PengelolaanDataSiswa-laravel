<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/','PagesController@index');


// Route Login
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// JIKA BELUM MELAKUKAN LOGIN ROUTE GROUP INI AKAN BERJALAN
Route::group(['middleware' => 'auth'],function(){
    

    Route::get('/students/highcharts','PagesController@chart');
    // Route Pages
    Route::get('/about','StudentsController@about');
    
    //Route Student
    Route::get('/student','StudentsController@index');
    Route::get('/student/create','StudentsController@create');
    Route::get('/student/{student}','StudentsController@show');
    Route::post('/student','StudentsController@store');
    Route::delete('/student/{student}','StudentsController@destroy');
    Route::get('/student/{student}/edit','StudentsController@edit');
    Route::patch('/student/{student}','StudentsController@update');

    Route::get('/class/student/{kelas}','StudentsController@kelas');

    // Route Search 
    Route::get('/search/kelas/{kelas}','StudentsController@searchkelas');
    Route::get('/search/jurusan/{jurusan}','JurusanController@searchjurusan');

    // Route Email
    Route::get('/sendEmail','StudentsController@email');
    Route::post('/students/email','StudentsController@sendemail');
    Route::get('/manyEmail','StudentsController@manyemail');
    Route::post('/students/manyEmail','StudentsController@sendmanyemail');
    Route::get('/sendEmail/{kepada}','AdministrasiController@email');

    // Route Export
    Route::get('/export/students','StudentsController@export');
    Route::get('/export/{kelas}/kelas','StudentsController@exportkelas');
    Route::get('/students/{data}/rpl/{jurusan}','JurusanController@export');
    Route::get('/students/{data}/tkj/{jurusan}','JurusanController@export');

    

    // Route Jurusan
    Route::get('/students/pages/{jurusan}','JurusanController@pages');

    // Route Excel extension
    Route::post('/students/import_excel', 'StudentsController@import_excel');

    // Route Administrasi
    Route::get('/students/administrasi','AdministrasiController@index');
    Route::post('/student/administrasi','AdministrasiController@store')->name('insert');
    Route::get('/administrasi/{kelas}/students','AdministrasiController@export')->name('export');
    Route::delete('/student/{administrasi}/administrasi','AdministrasiController@destroy');

});



