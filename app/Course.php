<?php

namespace App;

use App\Http\Controllers\SubjectsController;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'schoolCoursesID', 'schoolID', 'courseID'
    ];

    protected $table = 'SchoolCourses';

    public $timestamps = false;


    public function subjects (){
        return $this->hasMany(Subjects::class);
    }
}
