<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table='area';//指定表
    protected $primaryKey='id';//指定主键id
    public $timestamps=false;//关闭时间戳
    protected $guarded=[];//黑名单
}
