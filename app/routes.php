<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return app_path();
	//return View::make('hello');
});
Route::resource('accounts', 'AccountsController');
Route::resource('subsidiaries', 'SubsidiariesController');

Route::resource('branches', 'BranchesController');


Route::resource('areas', 'AreasController');
Route::resource('positions', 'PositionsController');
Route::resource('users', 'UsersController');
Route::resource('employees', 'EmployeesController');