<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\UserRole;

class DashboardController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $user = User::find($id);

        $role = User::where('id', '1')->first();

        

        return view('dashboard',compact('role'));
    }


    public function show(){
        $id = Auth::id();
        $user = User::where('id', $id)->first();

        if($user){
            echo "<p> {$user->name}</p>";
        }
    }
}
