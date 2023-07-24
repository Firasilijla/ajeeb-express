<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\SociaLite;

class FacebookController extends Controller
{
   public function facebookpage()
   {
      return SociaLite::driver('facebook')->redirect();
   }

   public function facebookredirect()
   {

      try {
         $user = SociaLite::driver('facebook')->user();
         $finduser = User::where('facebook_id', $user->id)->first();
         if ($finduser) {
            Auth::login($finduser);
            return redirect()->route('user.user.home');
         } else {
            $newUser = User::updateOrCreate(
               ['email' => $user->email],
               ['type' => "2", 'name' => $user->name, 'facebook_id' => $user->id, 'password' =>  encrypt('123456dummy')]
            );

            Auth::login($newUser);
            return redirect()->route('user.user.home');
         }
      } catch (Exception $e) {
         dd($e->getMessage());
      }
   }
}
