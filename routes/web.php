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

Auth::routes(['register' => false]);

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth', 'prefix' => '/dashboard', 'as' => 'dashboard.'], function ()
{
	Route::get('/', function ()
	{
		return view('backend.index');
	})->name('index');

	Route::resource('committees', 'Backend\CommitteeController');
	Route::resource('flats', 'Backend\FlatController');
	Route::resource('residents', 'Backend\ResidentController');
	Route::resource('transactions', 'Backend\TransactionController');
	Route::resource('assets', 'Backend\AssetController');
	Route::resource('resident-staffs', 'Backend\ResidentStaffController');
	Route::resource('building-staffs', 'Backend\BuildingStaffController');
});
