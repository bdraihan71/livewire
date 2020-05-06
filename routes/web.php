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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/category', 'HomeController@category')->name('category');
// Route::get('/subcategory', 'HomeController@subCategory')->name('subcategory');
// Route::get('/post', 'HomeController@post')->name('post');

Route::livewire('/category', 'categorycomponent')->name('category');
Route::livewire('/subcategory', 'sub-category-component')->name('subcategory');
Route::livewire('/post', 'post-component')->name('post');
