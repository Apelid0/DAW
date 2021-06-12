<?php

namespace App\Http\Controllers;
use App\Course;
use App\SchoolCourses;
use App\Subjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
        $subjects = DB::table('Subjects')
        ->join('SchoolCourses', 'Subjects.schoolCoursesID', "=", 'SchoolCourses.schoolCoursesID')
        ->join('Course', 'SchoolCourses.courseID', "=", 'Course.courseID')
        ->join('School', 'SchoolCourses.schoolID', "=", 'School.schoolID')
        ->select('School.name  as school', 'Course.name as course', 'Subjects.name as subject', 'Subjects.semester as semester', 'Subjects.curricularYear as grade', 'Subjects.schoolCoursesID as schoolCoursesID')
        ->get();


        $numberOfCourses = $this->NumberOfCourses($subjects);
        $courses = $this->Courses($subjects);
        $array = array(array('name' => 'Taylor'), array('name' => 'Dayle'));



        return view('dashboard.course',compact('subjects', 'numberOfCourses', 'courses'));
    }


    public function NumberOfCourses($subjects)
    {
        $subjectCourse = $subjects->pluck('course')->toArray();
        $course = array_unique($subjectCourse);
        $numberOfCourse = count($course);

        return ($numberOfCourse);
    }

    public function Courses($subjects)
    {
        $subjectCourse = $subjects->pluck('course')->toArray();
        $course = array_unique($subjectCourse);


        /*
        $myarray = array();
        foreach($course as $courses){
            $ola = SchoolCourses::where('schoolCoursesID', $subject->schoolCoursesID)->max('semester');
            dd($ola);
            $myarray[] = array('item' => $course, 'ddsa' => $ola);
          }
          dd($myarray);
        */

        return ($course);
    }
}
