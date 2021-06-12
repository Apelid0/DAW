<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = DB::table('Teaches')
            ->join('UserRole', 'Teaches.userID', "=", 'UserRole.userID')
            ->join('User', 'Teaches.userID', "=", 'User.id')
            ->join('OngoingSubject', 'Teaches.ongoinSubjectID', "=", 'OngoingSubject.ongoingSubjectID')
            ->join('Subjects', 'OngoingSubject.subjectID', "=", 'Subjects.subjectsID')
            ->select('User.name as teacherName', 'Subjects.name as subject', 'Teaches.teachesID as teachesID')
            ->get();

        $subjects = DB::table('OngoingSubject')
            ->join('Subjects', 'OngoingSubject.subjectID', "=", 'Subjects.subjectsID')
            ->select('OngoingSubject.ongoingSubjectID  as ongoingSubjectID', 'Subjects.name as subject')
            ->get();

        $teacherNames = DB::table('User')
            ->join('UserRole', 'User.id', "=", 'UserRole.userID')
            ->where('Role.role_name', 'teacher')
            ->join('Role', 'UserRole.roleID', "=", 'Role.roleID')
            ->select('User.name  as teacherName', 'User.id as userID')
            ->get();

        $subjects2 = DB::table('OngoingSubject')
            ->join('Subjects', 'OngoingSubject.subjectID', "=", 'Subjects.subjectsID')
            ->select('OngoingSubject.ongoingSubjectID  as ongoingSubjectID', 'Subjects.name as subject')
            ->get();

        $teacherNames2 = DB::table('User')
            ->join('UserRole', 'User.id', "=", 'UserRole.userID')
            ->where('Role.role_name', 'teacher')
            ->join('Role', 'UserRole.roleID', "=", 'Role.roleID')
            ->select('User.name  as teacherName', 'User.id as userID')
            ->get();

        return view('dashboard.teacher',compact('teachers','subjects', 'teacherNames', 'teacherNames2', 'subjects2'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'subject' => 'required|max:255',
        ]);

        Teacher::create([
            'userID' => $request->name,
            'ongoinSubjectID' => $request->subject,
        ]);

        return redirect()->route('teacher');
    }

    public function deletePost($id)
    {
        Teacher::where('teachesID', $id)->delete();

        return redirect()->route('teacher');
    }

    public function editPost($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'subjectEdit' => 'required|max:255',
        ]);

        Teacher::where('teachesID', $id)->update(['userID'=> $request->name]);
        Teacher::where('teachesID', $id)->update(['ongoinSubjectID'=> $request->subjectEdit]);

        return redirect()->route('teacher');
    }

}
