<?php

Route::get('facebook', 'AccountController@facebook_redirect');
// Get back to redirect url

Route::get('account/facebook', 'AccountController@facebook');

Route::get     ('/adminpanel', 'HomeController@index');

//koralife
Route::get     ('/',            'DesiqueController@index');

//championship page
Route::get     ('/about_champion',      'KoralifeController@about');

//coach page
Route::get     ('/coaches_champion',    'KoralifeController@coaches');
Route::get     ('/coach_profile/{id}',    'KoralifeController@coache_profile');


//News pages
Route::get     ('/news',         'KoralifeController@news');
Route::POST    ('/news'             , array('as' => 'loadmore','uses' => 'KoralifeController@loadmore'));
Route::get     ('/Newdetails/{id?}',         'KoralifeController@getnew');

//post
Route::get('/posts'  , 'KoralifeController@post');
Route::get('/posts/{id?}'  , 'KoralifeController@post_details');
Route::get('/prevpost/{id?}'  , 'KoralifeController@post_details');
Route::get('/nextpost/{id?}'  , 'KoralifeController@post_details');


//advert
Route::POST    ('/advert/store'             , array('as' => 'addadvert','uses' => 'AdvertController@store'));
Route::POST    ('/advert/update'         ,'AdvertController@update');
Route::resource('/advert'                , 'AdvertController');

//News
Route::POST    ('/snew/store'          ,array('as' => 'addsnew','uses' => 'SnewController@store'));
Route::POST    ('/snew/update'         ,'SnewController@update');
Route::resource('/snew'                , 'SnewController');

//admin users
Route::resource('/users/update_admin' ,'AdminController@update_admin');
Route::resource('/users' ,'AdminController');


//post
Route::POST    ('/post/store'            ,'PostController@store');
Route::POST    ('/post/update'           ,'PostController@update');
Route::resource('post', 'PostController');

//Post comments
Route::resource('post-comments', 'Post_commentController');


//Front
Route::resource('/front'  , 'FrontEndController');

Route::controllers([
	'auth'      => 'Auth\AuthController',
	'password'  => 'Auth\PasswordController'
]);
