<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserRole;

class AppController extends Controller
{
    public function getAdminPage()
    {
        $users = User::all();
        return view('admin/useradmin', ['users' => $users]);
    }
    
    public function postedituser(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first();
        $user->userRole()->detach();
        if ($request['user_role']) {
            $user->userRole()->attach(UserRole::where('name', 'user_role')->first());
        }
        if ($request['admin']) {
            $user->userRole()->attach(UserRole::where('name', 'admin')->first());
        }
        return redirect()->back();
    }
    
    public function editUser($id) {
        $user = User::where('id',$id)->first();
        return view('admin/edituser',['usertoedit'=>$user]);
    }
}
