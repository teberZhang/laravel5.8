<?php

namespace App\Http\Controllers\Safety;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

/***
 * 安全系列 —— 加密
 * Class EncryptController
 * @package App\Http\Controllers\Safety
 */
class EncryptController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        // 不进行序列化的加密
//        $encrypted = Crypt::encryptString('Hello world.');
//        $decrypted = Crypt::decryptString($encrypted);

        try {
            $data = \App\Models\User::find(2);
            $encrypted = encrypt($data);
            $decrypted = decrypt($encrypted);
            dd($decrypted);
        } catch (DecryptException $e) {
            //
        }
    }
}
