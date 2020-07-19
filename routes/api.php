<?php

use Illuminate\Http\Request;

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

Route::resource('posts', 'PostController');
Route::resource('tags', 'TagController')->only(['index', 'show']);
Route::get('posts/{id}/tags', 'TagController@index');

Route::get('/stats', function () {
    return [
        'lessons' => 145,
        'series' => 5200,
    ];
});
