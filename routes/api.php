<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiProductController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/catalog', [ApiProductController::class, 'list']);
Route::post('/catalog/add', [ApiProductController::class, 'add']);
Route::post('/catalog/{id}/update', [ApiProductController::class, 'update']);
Route::post('/catalog/{id}/delete', [ApiProductController::class, 'delete']);



