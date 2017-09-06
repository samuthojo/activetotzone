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
//Route::get('read/{any}', 'ActiveTotControllerTwo@errorPage')->where('any', '*');
Route::get('watch/{id}/{title}', 'ActiveTotControllerTwo@watch');
//Route::get('watch/(:any)') = "page/watch/errorpage";
Route::get('watch/(:any)', 'ActiveTotControllerTwo@watch');  "page/watch/$1";
Route::get('listen/(:any)', 'ActiveTotControllerTwo@listen');

Route::get('admin', 'AdminController@admin_index')->name('admin_index');
$route['cms/replace_image/(:any)/(:any)'] = "page/replace_image/$1/$2";
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
$route['send_email'] = "page/send_email";
$route['home/(:any)'] = "page/errorpage";
$route['(:any)'] = 'page/errorpage';

//Routes below are a result of running make:auth
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
