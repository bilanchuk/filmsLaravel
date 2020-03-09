<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    public function show(){
        return view('userinfo');
    }

    public function changeInfo(Request $request){
        switch($request->path()){
            case 'infoname':
                $change = 0;
            break;
            case 'infomail':
                $change = 1;
            break;
            case 'infotel':
                $change = 2;
            break;
            case 'infodate':
                $change = 3;
            break;
        }
        return view('userinfo',compact('change'));
    }

    public function change(Request $request){
        switch($request->path()){
            case 'changename':
                $validated = $request->validate([
                    'name'=> 'required|max:255',
                ]);
                User::authid()->update(['name'=>''.$validated['name']]);
                break;
            case 'changemail':
                $validated = $request->validate([
                    'email'=> 'required|string|email|max:255|unique:users',
                ]);
                User::authid()->update(['email'=>''.$validated['email'],'email_verified_at'=>NULL]);
                return redirect()->to('email/verify');
                break;
            case 'changetel':
                $validated = $request->validate([
                    'date'=> 'required|numeric|min:11',
                ]);
                User::authid()->update(['tel'=>''.$validated['tel']]);
                break;
            case 'changedate':
                $validated = $request->validate([
                    'date'=> 'required|date',
                ]);
                User::authid()->update(['dateOfBirth'=>''.$validated['date']]);
                break;
        }
        return redirect()->to('info');
    }

    public function showChangePasswordForm(){
        return view('auth.passwords.reset');
    }
}
