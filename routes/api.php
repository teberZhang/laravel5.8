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
//如果路由是定义在 routes/api.php 的话，则无需关注 CSRF 保护问题
//Route::any('bar', function (Request $request) {
//    return 'This is a request from any HTTP verb';
//});
