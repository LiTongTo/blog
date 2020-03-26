<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
     protected $table='sale';//指定表
     protected $primaryKey='sale_id';//指定主键
     public $timestamps=false;//关闭时间戳
     protected $guarded=[]; //黑名单
}
