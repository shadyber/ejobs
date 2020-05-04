<?php

use Illuminate\Support\Facades\Route;
use App\Page;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    
       $page= new Page();
       $page->title='Dashboard';
       $page->subtitle='All';
        
    return view('dashboard')->with('page',$page);
})->name('dashboard');;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/deposit', 'AccountController@deposit')->name('deposit');


Route::get('/withdraw', 'AccountController@withdraw')->name('withdraw');


Route::get('/profile', 'ProfileController@index');
Route::post('/profile', 'ProfileController@update_avatar');
Route::resource('/jobs','JobController'); 
 Route::resource('/transaction','JobController');  