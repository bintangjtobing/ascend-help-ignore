<?php

use Illuminate\Support\Facades\Route;

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
// Login and logout
Route::get('/sign-out', function (Request $request) {
    header("cache-Control: no-store, no-cache, must-revalidate");
    header("cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

    // // Save logs logout
    // $saveLogs = new userLogs();
    // $saveLogs->userId = Auth::id();
    // $saveLogs->ipAddress = $request->ip();
    // $saveLogs->notes = 'Logged out from system.';
    // $saveLogs->save();

    Artisan::call('cache:clear');
    Session::flush();
    auth()->logout();
    Session::regenerate();
    return redirect('/');
});
// Auth url
Route::get('/login', function () {
    session()->regenerate();
    return Redirect::to('/login/' . csrf_token());
})->name('login');
Route::get('/login/{tokens}', 'authController@index');
Route::post('/login/{csrf_token}', 'authController@loginProcess');
Route::get('/forgot-password', 'authController@forgotPassword');
Route::get('/getUserLoggedIn', 'apiController@getLoggedUser');
Route::get('/ask-reset-password', 'authController@askReset');
Route::get('/reset-password/{id}', 'authController@resetPassword');
Route::post('/reset-password/{id}', 'authController@processResetPassword');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/{any}', 'spaController@index')->where('any', '.*');
});
