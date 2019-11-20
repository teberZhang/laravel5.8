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
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;

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
Route::post('postArticle', 'ArticlePostController@store')->name('art');

//-----------------------------基础组件 —— 错误异常---------------
Route::get('my404', 'LoggingController@notFound');

//-----------------------------基础组件 —— 日志---------------
Route::get('logWrite', 'LoggingController@write');

//-----------------------------数据库操作 —— Redis —— 发布/订阅-------
Route::get('redis-publish', function () {
    // 普通订阅
    Redis::publish('test-channel', json_encode(['foo' => 'bar']));
    //测试通配符订阅
    Redis::publish('users.me001', json_encode(['id' => rand(10,100)]));
});

//Route::get('sqlBuilder', 'Mongodb\CurdModelController@index');
Route::get('sqlBuilder', 'DbOperateController@select1');

/***
 * 广播类
 */
// 广播 —— public
Route::view('newsroom', 'newsroom');
// 广播 —— private
Route::view('privatePush', 'privatePush');
// 广播 —— 私有频道 PrivateChannel —— whisper事件的接收端 —— listenForWhisper(不经过laravel)
Route::view('privateWhisper', 'privateWhisper');
// 广播 —— 存在频道 PresenceChannel
Route::view('presencePush', 'presencePush');
// 广播通知
Route::view('newsBroadcastNotification', 'newsBroadcastNotification');

/***
 * Swoole相关
 */
/***
 * 基于Swoole实现高性能 Http 服务器(用Swoole替代Php-fpm请求分发)
 * 请求 http://laravel-s.test 效果和 http://local.laravel58.com 效果相同
 */
// 在 Laravel 中集成 Swoole 实现 WebSocket 服务器
Route::view('websocketLaravelsClient', 'laravels/websocketClient');
/***
 * 基于 Swoole 在 Laravel 中实现异步任务队列
 * 访问方式:
 * http://laravel-s.test/swooleTestTask
 * http://todo-s.test/swooleTestTask
 */
Route::get('swooleTestTask', 'Swoole\TestTaskController@index');
// Swoole事件监听 —— 自定义事件
Route::get('swooleTestEvent', 'Swoole\TestEventController@index');
/***
 * Swoole实战篇
 */
// 实时弹幕功能
Route::get('swoole-danmu',function () {
    return view('laravels/danmu');
});





Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/auth/callback', function (Request $request){
    $http = new GuzzleHttp\Client;
    $response = $http->post('http://local.laravel58.com/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => '3',  // your client id
            'client_secret' => 'TQWyTBVYidWtq4TWBGLLQv62ScONFmiq7BlgRKsI',   // your client secret
            'redirect_uri' => 'http://local.laravel58.com/auth/callback',
            'code' => $request->get('code'),
        ],
    ]);

    return json_decode((string) $response->getBody(), true);
});

// 密码授权令牌
Route::get('/auth/password', function (Request $request){
    $http = new \GuzzleHttp\Client();
    $response = $http->post('http://local.laravel58.com/oauth/token', [
        'form_params' => [
            'grant_type' => 'password',
            'client_id' => '3',
            'client_secret' => 'TQWyTBVYidWtq4TWBGLLQv62ScONFmiq7BlgRKsI',
            'username' => 'dongguan@163.com',
            'password' => '617574sha',
            'scope' => '',
        ],
    ]);

    return json_decode((string)$response->getBody(), true);
});
