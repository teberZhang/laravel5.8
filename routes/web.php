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
Route::get("hi",function (){
    return "hi";
});
Route::get("hello",function (){
    //重定向到外部域名
    return redirect()->away('http://www.haodiandian.cn');
});

/**
 * CSRF 保护
 * web.php中定义的路由使用了 Session 和 CSRF 保护等功能。
 */
Route::get('form_without_csrf_token', function (){
    return '<form method="POST" action="/hello_from_form"><button type="submit">提交</button></form>';
});

Route::get('form_with_csrf_token', function () {
    return '<form method="POST" action="/hello_from_form">' . csrf_field() . '<button type="submit">提交</button></form>';
});

Route::post('hello_from_form', function (){
    return 'hello laravel!';
});

/**
 * 路由重定向
*/
Route::redirect('/here', '/there', 301);
Route::get('/there', function () {
    return 'there';
});

/**
 * 视图路由
*/
Route::view('/test', 'test', ['name' => '学院君']);

/**
 * 路由参数
*/
//单个参数
Route::get('parone/{id}', function ($id) {
    return 'User ' . $id;
});
//多个路由参数
Route::get('parduo/{post}/comments/{comment}', function ($postId, $commentId) {
    return $postId . '-' . $commentId;
});
//可选参数
Route::get('kexuan/{name?}', function ($name = 'John') {
    return $name;
});
//正则路由
Route::get('zhengze/{id}/{name}', function ($id, $name) {
    // 同时指定 id 和 name 的数据格式
    return $id.'_'.$name;
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);
//正则全局约束
//RouteServiceProvider 类的 boot 方法中定义如
//Route::pattern('id', '[0-9]+');
//所有定义的路由{id} 是数字时才会被调用

/**
 * 命名路由
 */
/*Route::get('user/profile', function () {
    // 通过路由名称生成 URL
    return 'my url: ' . route('profile');
})->name('profile');*/
Route::get('user/profile', 'UserController@index')->name('profile');

Route::get('redirect', function() {
    // 通过路由名称进行重定向
    return redirect()->route('profile');
});
//参数传递给 route 函数。给定的路由参数将会自动插入到 URL 中
Route::get('userpar/{id}/profile', function ($id) {
    $url = route('profilepar', ['id' => 1]);
    return $url;
})->name('profilepar');

/**
 * 路由分组
 */
//中间件
Route::middleware(['first', 'second'])->group(function () {
    Route::get('/middlev', function () {
        // Uses first & second Middleware
    });
    Route::get('usermv/profile', function () {
        // Uses first & second Middleware
    });
});
//命名空间
Route::namespace('Admin')->group(function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
});
//子域名路由
//比如我们设置会员子域名为 account.blog.test，
//那么就可以通过 http://account.blog.test/user/1 访问用户 ID 为 1 的会员信息了
Route::domain('{account}.blog.dev')->group(function () {
    Route::get('user/{id}', function ($account, $id) {
        return 'This is ' . $account . ' page of User ' . $id;
    });
});
//路由前缀
Route::prefix('admin')->group(function () {
    Route::get('manager', function () {
        return '/admin/manager';
    });
});
//路由名称前缀
Route::name('admin.')->group(function () {
    Route::get('users', function () {
        // 新的路由名称为 "admin.users"...
        return 'fuck';
    })->name('users');
});
//路由名称前缀??

Route::get('user/{id}', 'UserController@show');
//单动作控制器
Route::get('oneAction', 'ShowProfile');
//资源路由
Route::resource('article', 'ArticleController');
Route::get('cookie/add', function () {
    $minutes = 24 * 60;
    return response('欢迎来到 Laravel 学院')->cookie('name', '学院君', $minutes);
});
Route::get('cookie/get', function(\Illuminate\Http\Request $request) {
    $cookie = $request->cookie('name');
    dd($cookie);
});

Route::get('cookie/response', function() {
    Cookie::queue(Cookie::make('site', 'Laravel学院',1));
    Cookie::queue('author', '学院君', 1);
    return response('Hello Laravel', 200)
        ->header('Content-Type', 'text/plain');
});

//-----------------------------Session--------------------------
Route::get('usersession', 'UserController@detail');

//-----------------------------基础组件 —— 表单验证---------------
// 显示创建博客文章表单...
Route::get('postArticle/create', 'ArticlePostController@create');
// 存储新的博客文章...
Route::post('postArticle', 'ArticlePostController@stores')->name('art');

