<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TradingController extends Controller
{
    function getTrading()
    {
        return view("User.Trading.index");
    }
    function Trading()
    {
        DB::beginTransaction();
        try {
            if (Auth::user()->is_trading == 1) {
                return response()->json(['status' => '0', 'msg' => ' You Are allready Trading ^_^']);
            } else {
                $user = DB::table('users')->where('id', Auth::user()->id)->update(['is_trading' => 1]);
            }


            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => '0', 'msg' => 'Error in trading']);
        }
        return response()->json(['status' => '1', 'msg' => 'Success in Trading Proccess.']);
    }

    // --------------buy  
    
    function Tradingbuy_ok(Request $request)
    {
        DB::beginTransaction();
        try {
            if ((Auth::user()->total_amount -$request->buy_q)< 0) {
                return response()->json(['status' => '0', 'msg' => ' Your financial wallet does not contain the sufficient amount for the purchase  !!']);
            } else {
                return response()->json(['status' => '1', 'msg' => '']);
            }


            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => '0', 'msg' => 'Error in trading']);
        }
        return response()->json(['status' => '1', 'msg' => 'Success in Trading Proccess.']);
    }
    function Tradingbuynow(Request $request)
    {
        DB::beginTransaction();
        $user=User::where('id',Auth::user()->id)->first();
        $usdamount=$user->total_amount;
        $btcamount=$user->total_bitcoin;

        try {
            if (Auth::user()->passcode ==$request->passcode) {
                $user = DB::table('users')->where('id', Auth::user()->id)->update(['total_amount' => ($usdamount-$request->buy_q),'total_bitcoin'=>($btcamount+intval($request->bitcoin))]);
                // return response()->json(['status' => '1', 'msg' => 'success Proccess']);
            } else {
                return response()->json(['status' => '0', 'msg' => ' PassCode Incoreect !!']);

            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => '0', 'msg' =>  $e->getMessage()]);
        }
        return response()->json(['status' => '1', 'msg' => 'Success in Trading Proccess.']);
    }

       // --------------sale  
    
       function Tradingsale_ok(Request $request)
       {
           DB::beginTransaction();
           try {
               if ((Auth::user()->total_bitcoin -$request->sale_q)< 0) {
                   return response()->json(['status' => '0', 'msg' => ' Your financial Bitcoin wallet does not contain the sufficient amount for the purchase  !!']);
               } else {
                   return response()->json(['status' => '1', 'msg' => '']);
               }
   
   
               DB::commit();
           } catch (\Exception $e) {
               DB::rollback();
               return response()->json(['status' => '0', 'msg' => 'Error in trading']);
           }
           return response()->json(['status' => '1', 'msg' => 'Success in Trading Proccess.']);
       }
       function Tradingsalenow(Request $request)
       {
           DB::beginTransaction();
           $user=User::where('id',Auth::user()->id)->first();
           $usdamount=$user->total_amount;
           $btcamount=$user->total_bitcoin;
   
           try {
               if (Auth::user()->passcode ==$request->passcode) {
                   $user = DB::table('users')->where('id', Auth::user()->id)->update(['total_amount' => ($usdamount+$request->sale_q),'total_bitcoin'=>($btcamount-intval($request->bitcoin))]);
                   // return response()->json(['status' => '1', 'msg' => 'success Proccess']);
               } else {
                   return response()->json(['status' => '0', 'msg' => ' PassCode Incoreect !!']);
   
               }
   
               DB::commit();
           } catch (\Exception $e) {
               DB::rollback();
               return response()->json(['status' => '0', 'msg' =>  $e->getMessage()]);
           }
           return response()->json(['status' => '1', 'msg' => 'Success in Trading Proccess.']);
       }
}
