<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

/*
This is for Testing Only

Route::get('/', function() {
    return response()->json(['message' => 'This is for testing!'], 200);
});

*/

// Route::resource('product', 'ProductsController');

Route::group(
    ['prefix' => 'products'],
    function () {
        Route::get('index', 'ProductsController@index');
        Route::post('create','ProductsController@create');
        Route::post('update','ProductsController@update');
        Route::post('delete','ProductsController@delete');
    }
);

Route::group(
    ['prefix' => 'orders'],
    function () {
        Route::get('index', 'OrdersController@index');
        Route::post('create','OrdersController@create');
        Route::post('update','OrdersController@update');
        Route::post('delete','OrdersController@delete');
    }
);

Route::group(
    ['prefix' => 'suppliers'],
    function () {
        Route::get('index', 'SuppliersController@index');
        Route::post('create','SuppliersController@create');
        Route::post('update','SuppliersController@update');
        Route::post('delete','SuppliersController@delete');
    }
);

Route::group(
    ['prefix' => 'payments'],
    function () {
        Route::get('index', 'PaymentsController@index');
        Route::post('create','PaymentsController@create');
        Route::post('update','PaymentsController@update');
        Route::post('delete','PaymentsController@delete');
    }
);