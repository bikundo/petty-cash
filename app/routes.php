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
	return View::make('hello');
});
Route::get('/display', 'Display@index');

Route::get('/pdf', function()
{
    $html = $html =  URL::to('display'); 
    return PDF::load($html, 'A4', 'portrait')->download('my_pdf');
});

Route::resource('transactions', 'TransactionsController');

Route::resource('comments', 'CommentsController');

Route::resource('balances', 'BalancesController');