<?php

namespace App\Models;

use Emadadly\LaravelUuid\Uuids;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

/***
 * Mongodb 类 Model —— UserModel
 * Class MongodUserModel
 * @package App\Models
 */
class MongodUserModel extends Model
{
    use Uuids,SoftDeletes;

    /***
     * 指示ID是否自动递增.
     * @var bool
     */
    public $incrementing = false;

    protected $connection = 'mongodb';

    protected $collection = 'm_user';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * 应该被调整为日期的属性
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
