<?php

Route::group(['middleware'=>['checkAdminActiveStatus']],function(){
	Route::get('/home', function () {
	    $users[] = Auth::user();
	    $users[] = Auth::guard()->user();
	    $users[] = Auth::guard('admin')->user();

	    return view('admin.home');
	})->name('home');

	Route::get('/', function() {
        return view('admin.index');
    });
	Route::resource('/addproduct', 'Admin\AddproductController');
	Route::resource('/users', 'Admin\ManageUserController');
});


