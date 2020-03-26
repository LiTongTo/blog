<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
      
      protected $table='brand';//指定表
      protected $primaryKey='brand_id';//指定 主键
      public $timestamps=false; //关闭时间戳
      protected $guarded=[];// $guarded 不能被批量 赋值的属性   如果想让所有的属性都是可以批量赋值 可以将 $guarded 设置为空数组 
}
