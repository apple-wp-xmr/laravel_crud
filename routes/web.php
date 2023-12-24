<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
    Route::get('', "IndexController")->name('post.index');
    Route::get('/create', "CreateController")->name('post.create');
    Route::post('/store', 'StoreController')->name('post.store');
    Route::get('/{post}', 'ShowController')->name('post.show');
    Route::get('/{post}/edit', 'EditController')->name('post.edit');
    Route::patch('/{post}', 'UpdateController')->name('post.update');
    Route::delete('/{post}', 'DestroyController')->name('post.destroy');
    
    // Route::get('/posts/firstOrCreate', "PostController@firstOrCreate");
});



// using views
Route::get('/main', "MainController@index")->name('main.index');
Route::get('/contacts', "ContactsController@index")->name('contact.index');
Route::get('/about', "AboutController@index")->name('about.index');
Route::get('/calc', 'SampleController@calculate');




Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function(){
    Route::group(['namespace' => 'Post'], function(){
            Route::get('/post', "IndexController")->name('admin.post.index');
    });
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
