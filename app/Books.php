<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
     protected $table='books';//指定表
     protected $primaryKey='b_id';//指定主键id 
     public $timestamps=false;//关闭时间戳 
     protected $guarded=[];//黑名单
}
