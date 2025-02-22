<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRegisterRequest;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    function getLogin()
    {
        return view("Admin.auth.Login");
    }

    function getRegister()
    {
        return view("Auth.Register");
    }
    function Register(AuthRegisterRequest $request) {
        try{

            $input=$request->all();
            $input['password']=Hash::make($input['password']);
            $user=User::create( $input);

        }catch(\Exception $ex){
            return redirect()->back();
        }
        return redirect()->route("auth.getLogin");


    }
    function Login(Request $request) {

        $creds=$request->only('email','password');
        if(Auth::guard('web')->attempt($creds)){
 
            return redirect()->route('admin.dashboard');
        }else{

            return back()->withErrors(['Login_Error'=>"email or Password is Incorrect .."])->withInput();
        }
    }

    
    function Logout(Request $request) {
           Auth::guard('web')->logout();
           return redirect()->route('admin.auth.getLogin');
        
    }
}
