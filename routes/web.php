<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get("hello",function (){
    echo "Hello, Welcome to LaravelAcademy.org";
});
//Route::get('/user', 'UserController@index');
//一个路由响应多种 HTTP 请求动作 —— 这可以通过 match 方法来实现
Route::match(['get', 'post'], 'foo', function () {
    return 'This is a request from get or post';
});
//any 方法注册一个路由来响应所有HTTP 请求动作
Route::any('bar', function () {
    return 'This is a request from any HTTP verb';
});

//CSRF 保护
Route::get('form_without_csrf_token', function (){
    return '<form method="POST" action="/hello_from_form"><button type="submit">提交</button></form>';
});

Route::get('form_with_csrf_token', function () {
    return '<form method="POST" action="/hello_from_form">' . csrf_field() . '<button type="submit">提交</button></form>';
});

Route::post('hello_from_form', function (){
    return 'hello laravel!';
});

//路由重定向
Route::redirect('/here', '/there', 301);
Route::get('/there', function () {
    return 'there';
});
//视图路由
Route::view('/test', 'test', ['name' => '学院君']);

//路由参数
Route::get('user/{id}', function ($id) {
    return 'User ' . $id;
});
//多个路由参数
Route::get('posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return $postId . '-' . $commentId;
});
//可选参数
Route::get('users/{name?}', function ($name = 'John') {
    return $name;
});

//正则路由
Route::get('usere/{id}/{name}', function ($id, $name) {
    // 同时指定 id 和 name 的数据格式
    return $id.'_'.$name;
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);



