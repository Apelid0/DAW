<?php

namespace App\Http\Controllers;

use App\UserRole;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function show(){


        //Para saber os roles dos utilizadores
        /*
        return DB::table('User')
            ->join('UserRole', 'User.id', "=", 'UserRole.userID')
            ->join('Role', 'UserRole.roleID', "=", 'Role.roleID')
            ->select('User.name', 'Role.role_name')
            ->get();
        */

        /*
        return DB::table('User')
            ->join('UserRole', 'User.id', "=", 'UserRole.userID')
            ->join('Takes', 'UserRole.userID', "=", 'Takes.userID')
            ->join('Class', 'CourseContent.classID', "=", 'Class.classID')
            ->get();
        */

        /*
        return DB::table('CourseContent')
            ->join('Class', 'CourseContent.classID', "=", 'Class.classID')
        ->rightJoin('Takes', 'CourseContent.CourseContentID', "=", 'Takes.courseContentID')

            ->get();
        */
        /*
        return DB::table('User')
            ->join('UserRole', 'User.id', "=", 'UserRole.userID')
            ->join('Takes', 'UserRole.userID', "=", 'Takes.userID')
        ->join('User', 'Takes.userID, "=', 'User.id')
            ->where('AcademicYear.status', 1)

            ->get();
*/
/*
        return DB::table('CourseContent')

            ->join('Takes', 'CourseContent.CourseContentID', "=", 'Takes.courseContentID')
            ->join('Class', 'CourseContent.classID', "=", 'Class.classID')
            ->join('UserRole', 'Takes.userID', "=", 'UserRole.userID')
            ->join('User', 'Takes.userID', "=", 'User.id')
            ->join('CorrentCourse', 'CourseContent.CourseContentID', "=", 'CorrentCourse.courseContentID')
            ->join('AcademicYear', 'CorrentCourse.academicYearID', "=", 'AcademicYear.academicYearID')
            ->where('AcademicYear.status', 1)
            ->join('Shift', 'CorrentCourse.correntID', "=", 'Shift.CourseContentID')
            ->join('Schedule', 'Shift.scheduleID', "=", 'Schedule.scheduleID')
            ->select('User.name as Username', 'Class.name as Class', 'AcademicYear.status as Status', 'Schedule.start', 'Schedule.end', 'Schedule.weekDay','Schedule.rotation')
            ->get();
*/

        /*
        return DB::table('Subjects')
            ->join('OngoingSubject', 'Subjects.subjectsID', "=", 'OngoingSubject.subjectID')
            ->join('ScholarYear', 'OngoingSubject.scholarYearID', "=", 'ScholarYear.scholarYearID')
            ->where('ScholarYear.status', 1)
            ->join('Takes', 'OngoingSubject.OngoingSubjectID', "=", 'Takes.OngoingSubjectID')
            ->join('UserRole', 'Takes.userID', "=", 'UserRole.userID')
            ->join('User', 'Takes.userID', "=", 'User.id')
            ->join('Shift', 'OngoingSubject.OngoingSubjectID', "=", 'Shift.OngoingSubjectID')
            ->join('Schedule', 'Shift.shiftID', "=", 'Schedule.shiftID')
            //->select('User.name as Username', 'Class.name as Class', 'AcademicYear.status as Status', 'Schedule.start', 'Schedule.end', 'Schedule.weekDay', 'Schedule.rotation')
            ->select('User.name as Username', 'Subjects.name as Class', 'ScholarYear.status as Status', 'Schedule.start', 'Schedule.end', 'Schedule.weekDay', 'Schedule.type', 'Shift.name')
            ->get();
        */

        /*
        return DB::table('Teaches')
            ->join('UserRole', 'Teaches.userID', "=", 'UserRole.userID')
            ->join('User', 'Teaches.userID', "=", 'User.id')
            ->join('OngoingSubject', 'Teaches.ongoinSubjectID', "=", 'OngoingSubject.ongoingSubjectID')
            ->join('Subjects', 'OngoingSubject.subjectID', "=", 'Subjects.subjectsID')
            ->select('User.name as teacherName', 'Subjects.name as subject')
            ->get();
        */

        /*
        return DB::table('OngoingSubject')
            ->join('Subjects', 'OngoingSubject.subjectID', "=", 'Subjects.subjectsID')
            ->select('OngoingSubject.ongoingSubjectID  as ongoingSubjectID', 'Subjects.name as subject')
            ->get();
        */


        /*
        return DB::table('User')
            ->join('UserRole', 'User.id', "=", 'UserRole.userID')
            ->where('Role.role_name', 'teacher')
            ->join('Role', 'UserRole.roleID', "=", 'Role.roleID')
            ->select('User.name  as teacherName', 'User.id as userID')
            ->get();
            */

            /*
            return DB::table('Subjects')
            ->join('SchoolCourses', 'Subjects.schoolCoursesID', "=", 'SchoolCourses.schoolCoursesID')
            ->join('Course', 'SchoolCourses.courseID', "=", 'Course.courseID')
            ->join('School', 'SchoolCourses.schoolID', "=", 'School.schoolID')
            ->select('School.name  as school', 'Course.name as course', 'Subjects.name as subject')
            ->get();
*/
/*
            $subjects = DB::table('Subjects')
            ->join('SchoolCourses', 'Subjects.schoolCoursesID', "=", 'SchoolCourses.schoolCoursesID')
            ->join('Course', 'SchoolCourses.courseID', "=", 'Course.courseID')
            ->join('School', 'SchoolCourses.schoolID', "=", 'School.schoolID')
            ->select('School.name  as school', 'Course.name as course', 'Subjects.name as subject')
            ->get();

            $subjectCourse = $subjects->pluck('course')->toArray();
            $course = array_unique($subjectCourse);
            */


            return User::where('id', '1')->first()
            ->get()->toArray();
    }
}
