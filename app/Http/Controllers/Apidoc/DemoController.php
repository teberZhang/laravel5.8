<?php

namespace App\Http\Controllers\Apidoc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/***
 * ApiDoc demo
 * Class DemoController
 * @package App\Http\Controllers\Apidoc
 */
class DemoController extends Controller
{
    /**
     * @api {post} /authorizations 创建一个token (create a token)
     * @apiDescription 创建一个token (create a token)
     * @apiGroup Auth
     * @apiPermission none
     * @apiParam {Email} email     邮箱
     * @apiParam {String} password  密码
     * @apiVersion 0.2.0
     * @apiSuccessExample {json} Success-Response:
     *     HTTP/1.1 201 Created
     *     {
     *         "data": {
     *             "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbHVtZW4tYXBpLWRlbW8uZGV1L2FwaS9hdXRob3JpemF0aW9ucyIsImlhdCI6MTQ4Mzk3NTY5MywiZXhwIjoxNDg5MTU5NjkzLCJuYmYiOjE0ODM5NzU2OTMsImp0aSI6ImViNzAwZDM1MGIxNzM5Y2E5ZjhhNDk4NGMzODcxMWZjIiwic3ViIjo1M30.hdny6T031vVmyWlmnd2aUr4IVM9rm2Wchxg5RX_SDpM",
     *             "expired_at": "2017-03-10 15:28:13",
     *             "refresh_expired_at": "2017-01-23 15:28:13"
     *         }
     *     }
     * @apiErrorExample {json} Error-Response:
     *     HTTP/1.1 401
     *     {
     *       "error": "用户面密码错误"
     *     }
     */
    public function authorizations()
    {
        //
    }

    /**
     *
     * @apiDefine RkNotFoundException
     *
     * @apiError RkNotFoundException 找不到相关数据
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 404 Not Found
     *     {
     *       "error": {
     *           "code": 404,
     *           "msg": "",
     *           "path" ""
     *       }
     *     }
     *
     */

    /**
     *
     * @api {get} /v3.1/ues/:sn/rt-info 获取设备上报实时信息
     * @apiVersion 3.1.0
     * @apiName GetUeRealTimeInfo
     * @apiGroup UE
     *
     * @apiHeader {String} Authorization 用户授权token
     * @apiHeader {String} firm 厂商编码
     * @apiHeaderExample {json} Header-Example:
     *     {
     *       "Authorization": "eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org",
     *       "firm": "cnE="
     *     }
     *
     * @apiParam {String} sn 设备序列号
     *
     * @apiSuccess {String} sn 设备序列号
     * @apiSuccess {Number} status 设备状态
     * @apiSuccess {Number} soc 电池电量百分比
     * @apiSuccess {Number} voltage 电池电压
     * @apiSuccess {Number} current 电池电流
     * @apiSuccess {Number} temperature 电池温度
     * @apiSuccess {String} reportTime 上报时间(yyyy-MM-dd HH:mm:ss)
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "sn": "P000000000",
     *       "status": 0,
     *       "soc": 80,
     *       "voltage": 60.0,
     *       "current": 10.0,
     *       "temperature": null,
     *       "reportTime": "2018-08-13 18:11:00"
     *     }
     *
     * @apiUse RkNotFoundException
     *
     */
    public function rtInfo()
    {
        //
    }
}
