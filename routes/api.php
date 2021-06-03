<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

Route::get('/files', [ApiController::class, 'getMedia']);
Route::post('/file-upload', [ApiController::class, 'uploadFile']);

Route::get('/{any}', function ($any) {

    return response()->json('message: 404 not found');

})->where('any', '.*');