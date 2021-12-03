<?php

use Illuminate\Support\Facades\Auth;
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

Route::middleware('dashboard.locales')->group(function () {
    Auth::routes();
});

Route::impersonate();
Route::get('locale/{locale}', 'LocaleController@update')->name('locale')->where('locale', '(ar|en)');

// Route::get('/', function () {
//     dd(Request()->all());
//     return view('welcome');
// });


Route::as('front.')->group(function () {
    Route::get('/', 'Frontend\FrontendController@index')->name('home');

    // Route::post('/contact/form' , 'Frontend\FrontendController@contactForm')->name('contact.form');
});


Route::get('/register/profile', 'ProfileController@register_form')->name('profiles.register_form');
Route::post('/register/profile', 'ProfileController@store')->name('profiles.register');
Route::get('profile', 'HomeController@index');
Route::get('profiles/{token}', 'ProfileController@main_data')->name('profiles.home');
Route::post('profiles/{token}/main_data', 'ProfileController@store_main_data')->name('profiles.main_data');
Route::post('profiles/{token}/address', 'ProfileController@store_address')->name('profiles.address');
Route::post('profiles/{token}/education', 'ProfileController@store_education')->name('profiles.education');
Route::post('profiles/{token}/goals', 'ProfileController@store_goals')->name('profiles.goals');
