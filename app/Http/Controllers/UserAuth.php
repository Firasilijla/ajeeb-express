<?php

namespace App\Http\Controllers;

use App\Events\UserAccept;
use App\Helpers\NotificationHelper;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserAuth extends Controller
{
    // -------- getPage ------ 
    public function getLogin()
    {

        return  view('User.login');
    }
    public function getRegister()
    {

        return  view('User.register');
    }
    public function UserHome()
    {
        return  view('User.home');
    }
    public function AdminHome()
    {
        return  view('Admin.home');
    }

    // -------- datamodificarion ------ 
    function register(RegisterRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = new User();
            $user->fname = $request->fname;
            $user->lname = $request->lname;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->passcode = $request->passcode;
            $user->bitcoinpasscode = $request->passcode;
            $user->password = Hash::make($request->password);
            $user->n_password = $request->password;
            $user->save();
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back();
        }
        return redirect()->route('getLogin');
    }


    function check(Request $request)
    {
        $creds = $request->only('username', 'password');
        if (Auth::guard('web')->attempt($creds)) {
            // if (Auth::user()->type === "admin") {
            //     return redirect()->route('admin.admin.home');
            // }
            // if (Auth::user()->type === "user") {
            //     return redirect()->route('user.user.home');
            // }

            if (Auth::user()->is_deleted == 0 && Auth::user()->status == 1) {
                if (Auth::user()->type === "admin") {
                    return redirect()->route('admin.admin.home');
                }
                if (Auth::user()->type === "user") {
                    return redirect()->route('user.user.home');
                }
            } else {
                Auth::guard('web')->logout();
                return  redirect()->route('welcome');
            }


        } else {
            return   back()->withErrors(['login_error' => '  UserName or Password incorrect !!'])->withInput();
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return  redirect()->route('getLogin');
    }


    function sendMessage(Request $request)
    {
        NotificationHelper::adminSendNotification($request->user,$request->title,$request->object,$request->status);
        return redirect()->back();
    }
}
