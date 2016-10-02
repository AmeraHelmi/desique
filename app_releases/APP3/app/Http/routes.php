<?php

Route::get     ('/adminpanel', 'HomeController@index');

//Desqiue
Route::get     ('/',            'DesiqueController@index');
Route::get     ('/desique',            'DesiqueController@desique');


//News pages
Route::get     ('/news',         'KoralifeController@news');
Route::POST    ('/news'             , array('as' => 'loadmore','uses' => 'KoralifeController@loadmore'));
Route::get     ('/Newdetails/{id?}',         'KoralifeController@getnew');

//post
Route::get('/posts'  , 'KoralifeController@post');
Route::get('/posts/{id?}'  , 'KoralifeController@post_details');
Route::get('/prevpost/{id?}'  , 'KoralifeController@post_details');
Route::get('/nextpost/{id?}'  , 'KoralifeController@post_details');

//News
Route::POST    ('/snew/store'          ,array('as' => 'addsnew','uses' => 'SnewController@store'));
Route::POST    ('/snew/update'         ,'SnewController@update');
Route::resource('/snew'                , 'SnewController');

//members
Route::POST    ('/member/store'          ,array('as' => 'addmember','uses' => 'MemberController@store'));
Route::POST    ('/member/update'         ,'MemberController@update');
Route::resource('/member'                , 'MemberController');

//admin users
Route::resource('/users/update_admin' ,'AdminController@update_admin');
Route::resource('/users' ,'AdminController');

//about
Route::POST    ('/about/store'          ,array('as' => 'addabout','uses' => 'AboutController@store'));
Route::POST    ('/about/update'         ,'AboutController@update');
Route::resource('/about'                , 'AboutController');


//services
Route::POST    ('/service/store'            ,array('as' => 'addservice','uses' => 'ServiceController@store'));
Route::POST    ('/service/update'           ,'ServiceController@update');
Route::resource('service', 'ServiceController');

//products
Route::POST    ('/product/store'            ,array('as' => 'addproduct','uses' => 'ProductController@store'));
Route::POST    ('/product/update'           ,'ProductController@update');
Route::resource('product', 'ProductController');

//post
Route::POST    ('/post/store'            ,'PostController@store');
Route::POST    ('/post/update'           ,'PostController@update');
Route::resource('post', 'PostController');

//Photos
Route::POST    ('/g_album_photo/store'          ,array('as' => 'addg_album_photo','uses' => 'G_album_photoController@store'));
Route::POST    ('/g_album_photo/update'         ,'G_album_photoController@update');
Route::resource('/g_album_photo'                , 'G_album_photoController');

//Front
Route::resource('/front'  , 'FrontEndController');

Route::controllers([
	'auth'      => 'Auth\AuthController',
	'password'  => 'Auth\PasswordController'
]);
