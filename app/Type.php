<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table="type";
    protected $primaryKey="t_id";
    public $timestamps=false;
    protected $guarded=[];
}
