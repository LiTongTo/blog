<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table='admin';//指定表
    protected $primaryKey='admin_id';//指定主键 id
    public $timestamps=false;//关闭时间戳
    protected $guarded=[];//黑名单
}
