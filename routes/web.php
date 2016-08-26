<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Nahid\Times\Time;

Route::get('/', 'BlogController@recentBlog');

Route::get('design', 'UserController@design');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
        Route::get('users', 'UserController@allUsers');
        Route::get('registration', 'UserController@getNewUserForm');
        Route::post('registration', 'UserController@makeRegistration');
        Route::get('login', 'UserController@login');
        Route::post('login', 'UserController@makeLogin');


        Route::get('blog/new', 'BlogController@newBlogForm');
        Route::post('blog/new', 'BlogController@saveBlog');

});

Route::get('times', function(){
    $time = new Time;

    return $time->makeAgo('2016-07-01');
});
