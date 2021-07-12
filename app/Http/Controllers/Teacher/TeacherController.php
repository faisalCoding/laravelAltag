<?php


namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    function check(Request $request){
         //Validate Inputs
         $request->validate([
            'email'=>'required|email|exists:teachers,email',
            'password'=>'required|min:5|max:30'
         ],[
             'email.exists'=>'This email is not exists in teachers table'
         ]);

         $creds = $request->only('email','password');

         if( Auth::guard('teacher')->attempt($creds) ){
             return redirect()->route('dash');
         }else{
             return redirect()->route('teacher.login')->with('fail','Incorrect credentials');
         }
    }

    function logout(){
        Auth::guard('teacher')->logout();
        return redirect('/');
    }
}