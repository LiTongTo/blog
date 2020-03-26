<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
     protected $table='cart';//指定表
     protected $primaryKey='cart_id';//指定主键id
     public $timestamps=false;//关闭时间戳
     protected $guarded=[];//黑名单
}
