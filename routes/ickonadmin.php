<?php

Route::group(['middleware'=>['checkAdminActiveStatus']],function(){

	Route::get('/home', function () {
	    $users[] = Auth::user();
	    $users[] = Auth::guard()->user();
	    $users[] = Auth::guard('ickonadmin')->user();
	    
	    return view('ickonadmin.home');
	})->name('home');

	Route::get('/', function() {
        return view('ickonadmin.index');
    });

    Route::resource('/addproduct', 'Ickonadmin\AddproductController');
});