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

Route::get('/', 'ActiveTotControllerOne@index');
Route::get('/home', 'ActiveTotControllerOne@index');
Route::get('/about_us', 'ActiveTotControllerOne@about_us');
Route::get('/blogs', 'ActiveTotControllerOne@blog');
Route::get('/video/{category}', 'ActiveTotControllerOne@video');
Route::get('/contactUs', 'ActiveTotControllerOne@contactUs');
Route::get('/calendar', 'ActiveTotControllerOne@calendar');

Route::get('read/{blog_id}/{blog_title}', 'ActiveTotControllerTwo@read');

Route::get('watch/{id}/{title}', 'ActiveTotControllerTwo@watch');

//Route::get('watch/(:any)', 'ActiveTotControllerTwo@watch');  "page/watch/$1";
//Route::get('listen/(:any)', 'ActiveTotControllerTwo@listen');

Route::get('admin', 'AdminController@admin_index')->name('login');
Route::post('cms/replace_image/{form_name}/{id}', 'CmsController@replace_image');
Route::get('cms/form_add/{form_name}', 'CmsController@form_add');
Route::post('cms/save_data/{form_name}', 'CmsController@save_data');
Route::get('cms/form_edit/{form_name}/{id}', 'CmsController@form_edit');
Route::post('cms/save_form_changes/{form_name}', 'CmsController@save_form_changes');
Route::delete('cms/form_delete/{form_name}/{id}', 'CmsController@form_delete');
Route::get('cms/team', 'CmsController@team');
Route::get('cms/video', 'CmsController@cms_video');
Route::get('cms/blog', 'CmsController@cms_blog');
Route::get('cms/blog_details/{blog_id}', 'CmsController@blog_details');
Route::get('cms/change_password', 'AdminController@change_password');
Route::post('cms/change_password_form', 'AdminController@change_password_form');

Route::post('admin/login', 'AdminController@login');
Route::get('logout', 'AdminController@logout');
Route::get('adminstart', 'AdminController@adminstart');
Route::post('send_email', 'AdminController@send_email');

Route::get('events', 'EventsController@get_events');
Route::get('event/{id}', 'EventsController@get_single_event');
Route::get('event_form', 'EventsController@display_form');
Route::post('create', 'EventsController@create');
Route::delete('delete/{id}', 'EventsController@delete');
Route::get('edit/{id}', 'EventsController@edit');

Route::get('books', 'BooksController@index');
Route::get('add_book_form', 'BooksController@book_form');
Route::post('save_book', 'BooksController@save');
Route::get('view_book/{id}', 'BooksController@view_book');
Route::get('download/{id}', 'BooksController@download');
Route::delete('delete/{id}', 'BooksController@delete');
Route::get('edit/{id}', 'BooksController@edit');

//$route['home/(:any)'] = "page/errorpage";
//$route['(:any)'] = 'page/errorpage';
//Route::get('read/{any}', 'ActiveTotControllerTwo@errorPage')->where('any', '*');
//Route::get('watch/(:any)') = "page/watch/errorpage";

//Routes below are a result of running make:auth
//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
