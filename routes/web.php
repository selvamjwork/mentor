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
// Route::group(array('https'), function()
// {

	Route::get('/', function() {
		return redirect('/products');
	});

	Auth::routes();
	
	Route::get('/privacy', 'DefaultConreoller@privacy')->name('privacy');
	Route::get('/terms', 'DefaultConreoller@terms')->name('terms');
	Route::get('/payment', 'DefaultConreoller@payment')->name('payment');

	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/verifyEmail/{token}', 'Auth\VerificationController@VerifyEmail');
	Route::get('/products','ProductController@index');
	Route::get('/products/{add}','ProductController@show');

	Route::POST('/checkout', 'PaymentController@payment');
	Route::get('/checkout', function(){
		return redirect()->back()->with('status','You are successfully logged in');
	});

	# Status Route
	Route::GET('/response/status', 'PaymentController@status');
	Route::post('/response', 'PaymentController@status');


	# Route for PDF
	Route::get('pdfview',array('as'=>'pdfview','uses'=>'ItemController@pdfview'));

	Route::group(['middleware' => ['auth']],function(){
		#Verification controller
		Route::get('/notVerified', 'Auth\VerificationController@notVerified');
		Route::get('/resendEmailToken', 'Auth\VerificationController@resendEmailToken');	
	});

	//Admin Login
	Route::get('admin', 'AdmindminAuth\LoginController@showLoginForm');
	Route::get('admin/login', 'AdminAuth\LoginController@showLoginForm');
	Route::post('admin/login', 'AdminAuth\LoginController@login');
	Route::post('admin/logout', 'AdminAuth\LoginController@logout');

	//Admin Passwords
	Route::post('admin/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
	Route::post('admin/password/reset', 'AdminAuth\ResetPasswordController@reset');
	Route::get('admin/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
	Route::get('admin/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
// });