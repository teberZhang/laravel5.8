<?php

namespace App\Http\Controllers\Safety;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

/***
 * 安全系列 —— 哈希
 * Class HashController
 * @package App\Http\Controllers\Safety
 */
class HashController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        // 修改用户密码
        $user = \App\Models\User::find(1);
        /*$user->fill([
            'password' => Hash::make('617574sha')
        ])->save();
        return 'success';*/

        // 验证密码
        if (Hash::check('617574sha', $user->password)) {
            return 'ok';
        } else {
            return 'no';
        }

        // 调整 Bcrypt 工作因子
        /*$hashed = Hash::make('password', [
            'rounds' => 12
        ]);
        var_dump($hashed);
        // 检查密码是否需要被重新哈希
        if (Hash::needsRehash($hashed)) {
            $user->fill([
                'password' => Hash::make('617574sha')
            ])->save();
        }*/

    }
}
