<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userss extends Model
{
    protected $table='userss';//指定表
    protected $primaryKey='user_id';//指定主键id
    public $timestamps=false;//关闭时间戳
    protected $guarded=[];//黑名单
}
