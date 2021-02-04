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
//     return view('fron-end.master');
// });
Route::get('/','HomeController@index')->name('home');

Route::get('blog-detail','HomeController@blog_detail')->name('home.blog-detail');

Route::get('chuyen-nghe-nghiep','HomeController@chuyennghenghiep')->name('home.chuyennghenghiep');

Route::get('chuyen-doi','HomeController@chuyendoi')->name('home.chuyendoi');

Route::get('chuyen-linh-tinh','HomeController@chuyenlinhtinh')->name('home.chuyenlinhtinh');

Route::get('tin-tuc-cong-nghe','HomeController@tintuccongnghe')->name('home.tintuccongnghe');

Route::get('blog/{id}-{blog_slug}.html','HomeController@blogdetail')->name('home.blogdetail');

Route::post('blog','HomeController@comment')->name('home.comment');

Route::get('library','HomeController@library')->name('home.library');

Route::post('contact','Backend\ContactController@store')->name('contact.store');



Route::prefix('admin')->group(function(){
    Route::get('/','Backend\AdminController@index')->name('admin');

    Route::get('dashboard','Backend\AdminController@dashboard')->name('admin.dashboard')->middleware('checklogin::class');

    Route::get('list-blog','Backend\BlogController@index')->name('blog.list-blog')->middleware('checklogin::class');

    Route::get('add-blog','Backend\BlogController@create')->name('blog.add-blog')->middleware('checklogin::class');

    Route::post('add-blog','Backend\BlogController@store')->name('blog.store')->middleware('checklogin::class');

    Route::get('update-blog/{id}','Backend\BlogController@getUpdate')->name('blog.getUpdate')->middleware('checklogin::class');

    Route::post('update-blog','Backend\BlogController@postUpdate')->name('blog.postUpdate')->middleware('checklogin::class');

    Route::get('delete/{id}','Backend\BlogController@delete')->name('blog.delete')->middleware('checklogin::class');

    Route::get('list-cate','Backend\CateController@index')->name('cate.list-cate')->middleware('checklogin::class');
    
    Route::post('list-cate','Backend\CateController@store')->name('cate.store')->middleware('checklogin::class');

    Route::get('delete-category/{id}','Backend\CateController@delete')->name('cate.delete')->middleware('checklogin::class');

    Route::get('list-user','Backend\UserController@index')->name('user.list-user')->middleware('checklogin::class');

    Route::post('list-user','Backend\UserController@create')->name('user.create')->middleware('checklogin::class');

    Route::post('login','Backend\UserController@login')->name('user.login');

    Route::get('logout','Backend\UserController@logout')->name('user.logout');

    Route::get('delete-user/{id}','Backend\UserController@delete')->name('user.delete')->middleware('checklogin::class');

    Route::get('library','Backend\LibraryController@index')->name('library.index')->middleware('checklogin::class');

    Route::post('library','Backend\LibraryController@create')->name('library.create')->middleware('checklogin::class');

    Route::get('library-delete/{id}','Backend\LibraryController@delete')->name('library,delete')->middleware('checklogin::class');

    Route::get('contact','Backend\ContactController@index')->name('contact.index')->middleware('checklogin::class');

    Route::get('destroy-contact','Backend\ContactController@destroy')->name('contact.destroy')->middleware('checklogin::class');

    Route::get('comment','Backend\CommentController@index')->name('comment.index')->middleware('checklogin::class');

    Route::get('destroy-comment','Backend\CommentController@destroy')->name('comment.destroy')->middleware('checklogin::class');
});
