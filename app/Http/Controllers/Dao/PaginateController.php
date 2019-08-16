<?php

namespace App\Http\Controllers\Dao;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

/***
 * Class paginateController
 * @package App\Http\Controllers
 * 数据库操作 —— 分页
 */
class PaginateController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        //$users = DB::table('users')->paginate(10);

        //User 模型进行分页
        $users = User::paginate(15);
        //自定义分页链接
        $users->withPath('custom/url');
        $users->appends(['sort' => 'votes'])->links();
        $users->fragment('foo')->links();
        return $users;
    }
}
