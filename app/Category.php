<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='category';//指定表
    protected $primaryKey='cate_id';//指定主键
    public $timestamps=false;//关闭时间戳
    protected $guarded=[];
}
