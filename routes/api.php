<?php

use App\Http\Controllers\Api\IntegerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// we can use controller resource for restful approach
// e.g. Route::resource('integers', IntegerController::class);

/**
 * will get a list of the recent converted integers
 * since there were no specs of how recent it was, will use 5 minuts ago
 */
Route::get('integers-recent', [IntegerController::class, 'IntergerRecent']);
/**
 * will convert and save intergers to roman values
 */
Route::post('integers', [IntegerController::class, 'store']);
/**
 * will get top ten converted integers
 */
Route::get('integers-top-ten', [IntegerController::class, 'getTopTen']);
