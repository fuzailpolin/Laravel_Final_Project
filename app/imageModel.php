<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class imageModel extends Model
{
    protected $table = "profileimagestore";
    protected $primaryKey = "id";
    public $timestamps = false;
}
