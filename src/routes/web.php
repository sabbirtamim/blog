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


Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Auth::routes();
// use App\User;
Route::get('/home', 'HomeController@index');
Route::resource('terms', 'TermController');
Route::resource('posts', 'PostController');
Route::resource('posts.comments', 'CommentController');
Route::resource('roles', 'RoleController');
Route::resource('userroles', 'UserRoleController');

Route::get('/blog', 'PostController@frontShow');
Route::get('/blog/{post_slug}', 'PostController@singlePost');



use App\Mail\WelcomeToDemoproject;
Route::get('/email', function () {

    // Mail::to('sabbirh87@gmail.com')->send(new WelcomeToDemoproject);

    $email= new WelcomeToDemoproject(new App\User(['username'=>'Sharif']));
    Mail::to('sabbirh87@gmail.com')->send($email);
});

use App\Notifications\PostNofification;
Route::get('/notify', function () {
	$user=App\User::all();
	// $user=Auth::user();
	$post=App\Post::first();
// print_r($post);
foreach ($user->chunk(3) as  $users) {
	foreach ($users as  $row) {
    $row->notify(new PostNofification($post));
	}
}

    // return view('notifications.welcome');
});

Route::get('/notifications', function () {


    return view('notifications.welcome');
});