<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    protected $table="art";
    protected $primaryKey="art_id";
    public $timestamps=false;
    protected $guarded=[];
}
