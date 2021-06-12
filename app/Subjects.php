<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    protected $fillable = [
        'subjectsID', 'schoolCoursesID', 'name', 'semester', 'curricularYear', 'credits'
    ];

    protected $table = 'Subjects';

    public $timestamps = false;
}
