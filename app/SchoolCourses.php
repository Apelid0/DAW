<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolCourses extends Model
{
    protected $fillable = [
        'schoolCoursesID', 'schoolID', 'courseID'
    ];

    protected $table = 'SchoolCourses';

    public $timestamps = false;
}
