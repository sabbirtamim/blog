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
Route::get('/', function () {
    return view('welcome');
    // Auth::user()->notify(new PostNofification);
});


Route::group(['middleware' => ['web'],'namespace'=>'\Blog\Http\Controllers' ], function () {
    //
    Route::get('/home', 'HomeController@index');
Route::resource('terms', 'TermController');
Route::resource('posts', 'PostController');
Route::resource('posts.comments', 'CommentController');
Route::resource('roles', 'RoleController');
Route::resource('userroles', 'UserRoleController');

Route::get('/blog', 'PostController@frontShow');
Route::get('/blog/{post_slug}', 'PostController@singlePost');


});
// Auth::routes();
// use App\User;
