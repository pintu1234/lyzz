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

/*
 * public routes
 */
Route::get('/', ['uses'=>'BlogController@index', 'as'=>'blog']);

Route::get('/blog/{post}', [
    'uses' => 'BlogController@show',
    'as'   => 'blog.show'
]);
Route::get('/category/{category}', [
    'uses'  => 'BlogController@category',
    'as'    => 'category'
]);
Route::get('/author/{author}',['uses'=>'BlogController@author', 'as'=>'author']);

/*
 * Admin routes
 */
Auth::routes();

Route::get('/home', 'Backend\HomeController@index')->name('home');
Route::get('/logout', 'CustomLoginController@logout');

/* ===== Admin Posts routes =====*/
Route::put('/admin/blogs/restore/{id}', ['uses' => 'Backend\AdminBlogController@restore'])->name('blogs.restore');

Route::delete('/admin/blogs/forceDelete/{id}', ['uses'=> 'Backend\AdminBlogController@forceDelete'])->name('blogs.forceDelete');

Route::get('/admin/blogs/trash', ['uses'=> 'Backend\AdminBlogController@all_trash'])->name('blogs.trash');

Route::get('/blogs/schedule-posts',['uses'=>'Backend\AdminBlogController@schedule_posts'])->name('blogs.schedule');
Route::get('/blogs/draft-posts',['uses'=>'Backend\AdminBlogController@draft_posts'])->name('blogs.draft');
Route::get('/blogs/publish-posts',['uses'=>'Backend\AdminBlogController@publish_posts'])->name('blogs.published');
Route::resource('admin/blogs', 'Backend\AdminBlogController');

/*==== Admin category routes ====*/
Route::resource('admin/categories', 'Backend\AdminCategoryController');



