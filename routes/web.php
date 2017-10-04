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

Route::get('/', 'LevelOne@index');
Route::get('/home', 'LevelOne@index');
Route::get('/about_us', 'LevelOne@about_us');
Route::get('/blogs', 'LevelOne@blog');
Route::get('/video/{category}', 'LevelOne@video');
Route::get('/contactUs', 'LevelOne@contactUs');
Route::get('/calendar', 'LevelOne@calendar');

Route::get('read/{blog_id}/{blog_title}', 'LevelTwo@read');

Route::get('watch/{id}/{title}', 'LevelTwo@watch');

Route::get('admin', 'Admin@admin_index')->name('login');
Route::post('cms/replace_image/{form_name}/{id}', 'Cms@replace_image');
Route::get('cms/form_add/{form_name}', 'Cms@form_add');
Route::post('cms/save_data/{form_name}', 'Cms@save_data');
Route::get('cms/form_edit/{form_name}/{id}', 'Cms@form_edit');
Route::post('cms/save_form_changes/{form_name}', 'Cms@save_form_changes');
Route::delete('cms/form_delete/{form_name}/{id}', 'Cms@form_delete');
Route::get('cms/team', 'Cms@team');
Route::get('cms/video', 'Cms@cms_video');
Route::get('cms/blog', 'Cms@cms_blog');
Route::get('cms/blog_details/{blog_id}', 'Cms@blog_details');
Route::get('cms/change_password', 'Admin@change_password');
Route::post('cms/change_password_form', 'Admin@change_password_form');

Route::post('admin/login', 'Admin@login');
Route::get('logout', 'Admin@logout');
Route::get('adminstart', 'Admin@adminstart');
Route::post('send_email', 'LevelOne@send_email');

Route::get('events', 'LevelOne@events');

Route::prefix('cms')->group(function() {

  Route::get('event/{id}', 'Events@get_single_event');
  Route::get('event_form', 'Events@display_form');
  Route::post('create_event', 'Events@create');
  Route::delete('delete/{id}', 'Events@delete');
  Route::get('edit/{id}', 'Events@edit');

  Route::get('books', 'Books@index');
  Route::get('add_book_form', 'Books@book_form');
  Route::post('save_book', 'Books@save');
  Route::get('view_book/{id}', 'Books@view_book');
  Route::get('download/{id}', 'Books@download');
  Route::delete('delete/{id}', 'Books@delete');
  Route::get('edit/{id}', 'Books@edit');

  Route::get('slideshows', 'Cms@slideshows');
  Route::post('slideshows/create', 'Cms@store');

});
