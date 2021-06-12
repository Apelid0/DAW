<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public  function index(){
        $hours = array("08:30", "09:30", "10:30", "11:30", "12:30", "13:30",  "14:30", "15:30", "16:30", "17:30", "18:30", "19:30");
        $schedules = DB::table('Subjects')
            ->join('OngoingSubject', 'Subjects.subjectsID', "=", 'OngoingSubject.subjectID')
            ->join('ScholarYear', 'OngoingSubject.scholarYearID', "=", 'ScholarYear.scholarYearID')
            ->where('ScholarYear.status', 1)
            ->join('Takes', 'OngoingSubject.OngoingSubjectID', "=", 'Takes.OngoingSubjectID')
            ->join('UserRole', 'Takes.userID', "=", 'UserRole.userID')
            ->join('User', 'Takes.userID', "=", 'User.id')
            ->join('Shift', 'OngoingSubject.OngoingSubjectID', "=", 'Shift.OngoingSubjectID')
            ->join('Schedule', 'Shift.shiftID', "=", 'Schedule.shiftID')
            ->select('User.name as Username', 'Subjects.name as Class', 'ScholarYear.status as Status', 'Schedule.start', 'Schedule.end', 'Schedule.weekDay', 'Schedule.type', 'Shift.name')
            ->get();

        return view('dashboard.schedule',compact('hours','schedules'));
    }


}
