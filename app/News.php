<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
     protected $table='news';//指定表
     protected $primaryKey='news_id';//指定主键id
     public $timestamps=false;//关闭时间戳
     protected $guarded=[];//黑名单
}
