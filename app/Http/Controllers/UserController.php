<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Closure;

class UserController extends Controller
{
    public function __construct()
    {
        /**
         * 访问 http://local.laravel58.com/user/1会变404
         * 访问 http://local.laravel58.com/user/1?id=1 才正确
        */
        /*$this->middleware(function (Request $request,Closure $next){
            if(!is_numeric($request->input('id'))){
                throw new NotFoundHttpException();
            }
            return $next($request);
        });*/
    }
    public function index()
    {
        return "userController-index";
    }

    /**
     * 为指定用户显示详情
     *
     * @param int $id
     * @return Response
     * @author LaravelAcademy.org
     */
    public function show($id)
    {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }
}
