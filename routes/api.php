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

/**
 * 路由模型绑定
 */
//隐式绑定
Route::get('users/{user}', function (App\User $user) {
    return $user->email;
});
//显式绑定

/**
 * 动态频率限制
 */
Route::middleware('auth:api', 'throttle:rate_limit,1')->group(function () {
    Route::get('/usertimes', function () {
        //
    });
});

Route::get('/redirect', function (){
    $query = http_build_query([
        'client_id' => '3',
        'redirect_uri' => 'http://local.laravel58.com/auth/callback',
        'response_type' => 'code',
        'scope' => '',
    ]);
    return redirect('http://local.laravel58.com/oauth/authorize?' . $query);
});
