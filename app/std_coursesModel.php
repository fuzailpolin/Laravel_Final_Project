<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class std_coursesModel extends Model
{
    protected $table = "std_courses";
    protected $primaryKey = "id";
    public $timestamps = false;
}
