<?php

namespace App\Helpers;

use App\Models\Settings;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class helper
{

    public static function Users()
    {

        return User::where('is_deleted', 0)->get()->count();
    }
    public static function Deposit()
    {

        return  Transaction::with("users")->where('type', 'LIKE', 'DEPOSIT%')->get()->count();
    }
    public static function Withdrow()
    {

        return  Transaction::with("users")->where('type','WITHDROW')->get()->count();
    }
    public static function TRX()
    {

        return  Transaction::with("users")->where('type','TRX')->get()->count();
    }
    public static function Settings()
    {

        return  Settings::get()->first();
    }
}
