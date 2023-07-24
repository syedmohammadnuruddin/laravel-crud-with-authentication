<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function showLogin(){
        return view('user.login');
    }
    public function login(){
        $this->validate(request(),[
           'name'=>'required',
           'password'=>'required'
        ]);
        if(
            Auth::attempt([
                'name'=>\request('name'),
                'password'=>\request('password')
            ])
        ){
            return to_route('contactList');
        }else{
            return redirect()->back()->with('loginError', 'Credentials does not match');
        }
    }
    public function logout(){
        Auth::logout();
        return to_route('login');
    }
}
