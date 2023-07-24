<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\SociaLite;
class GoogleController extends Controller
{
    public function googlepage()
    {
       return SociaLite::driver('google')->redirect();
    }
 
    public function googleredirect()
    {
 
       try {
          $google_user = SociaLite::driver('google')->user();

          $finduser = User::where('email', $google_user->email)->first();
          if (!$finduser) {

            $new_User = User::updateOrCreate(
               ['google_id' => $google_user->id],
               ['type' => "2", 'name' => $google_user->name, 'email' => $google_user->email, 'password' =>  encrypt('123456dummy')]
            );
            Auth::login($new_User);
            return redirect()->route('user.user.home');

          } else {
           
            Auth::login($finduser);
            return redirect()->route('user.user.home');
          }
       } catch (Exception $e) {
          dd($e->getMessage());
       }
    }
}
