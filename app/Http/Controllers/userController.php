<?php

namespace App\Http\Controllers;

use App\Mail\UserVerification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class userController extends Controller
{
    public function showRegister(){
        return view('user.register');
    }
    public function register(){
        $this->validate(request(),[
            'name'=>'required|alpha_dash|unique:users,name',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:4|confirmed'
        ]);
        $user = User::create([
            'name'=>\request('name'),
            'email'=>\request('email'),
            'password'=>\request('password')
        ]);
        $code = sha1(rand(1000,8000));
        $user->userVerify()->create([
            'code'=> $code
        ]);
        $generatedUrl = route('verifyEmail',[$user->email,$code]);
        Mail::to($user->email)->send(new UserVerification($generatedUrl));
        return 'Registered';
    }
    public function verifyUser($email, $code){
        $user = User::where('email',$email)->first();

        if($user){
            $userCode = $user->userVerify->code;
            if($userCode == $code){
                $user->update([
                    'email_verified'=>'yes'
                ]);
                $user->userVerify->delete();
                return 'User Verified';
            }else{
                return 'Unathurized Data';
            }
        }else{
            return 'Unauthorized';
        }
    }
}
