<?php

namespace App\Http\Controllers\Eloquent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

/***
 * Eloquent ORM —— API 资源类
 * Class EloquentApiController
 * @package App\Http\Controllers\Eloquent
 */
class EloquentApiController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $user = \UserResource(\App\Models\User::find(2));
        return $user;
    }
}
