<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class noticeModel extends Model
{
    protected $table = "user_notice";
    protected $primaryKey = "id";
    public $timestamps = false;
}
