<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
     protected $table='goods';//指定表
     protected $primaryKey='goods_id';//指定主键id
     public $timestamps=false;//关闭时间戳
     protected $guarded=[];//黑名单
}
