<?php

namespace App\Http\Controllers\Stage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

/***
 * 进阶系列 —— 文件存储
 * Class FilesController
 * @package App\Http\Controllers\Stage
 */
class FilesController extends Controller
{
    public function index()
    {
        /***
         * 公共磁盘
         * php artisan storage:link(public/storage 指向 storage/app/public 软链)
         */
//        Storage::disk('public')->put('file.txt','disks = public : Just kick your ass !');
//        echo asset('storage/file.txt');

        // 本地驱动 —— storage/app/file.txt
//        Storage::disk('local')->put('file.txt', 'I am fine, Thank you !');

        /***
         * 获取文件
         */
//        $contents = Storage::get('file.txt');
//        dump($contents);
        // exists 方法用于判断给定文件是否存在于磁盘上：
//        $exists = Storage::disk('public')->exists('file.jpg');
//        dump($exists);

        /***
         * 下载文件
         */
        //return Storage::download('file.txt');
        //return Storage::download('file.txt', 'file' . time() . '.txt', []);

        /***
         * 文件 URL
         */
//        $url = Storage::url('file.txt');
//        dump($url);

        /***
         * 文件元信息
         */
        // 文件大小
//        $size = Storage::size('file.txt');
//        dump($size);
        // 文件最后一次修改时间 —— UNIX 时间戳
//        $time = Storage::lastModified('file.txt');
//        dump($time);

        /***
         * 存储文件
         */
        // 自动文件流
        // 自动计算文件名的MD5值...
        //Storage::putFile('photos', new File('/storage/app/file.txt'));


    }
}
