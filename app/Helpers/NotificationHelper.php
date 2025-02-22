<?php

namespace App\Helpers;

use App\Events\UserAccept;
use App\Models\UserNotification;
use DateTime;
use GuzzleHttp\Client;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotificationHelper
{
    public static function adminSendNotification($user_id,$title,$obj,$status)
    {
        $currentDateTime = new DateTime('now');
        $currentDate = $currentDateTime->format(' F j, Y');
        DB::beginTransaction();
        try {
            $notdata = [
                'user_id' =>$user_id,
                'title' => $title,
                'object' =>$obj,
                'status' =>$status,
                'date' => $currentDate
            ];
            $not_id =  UserNotification::insertGetId($notdata);
            event(new UserAccept($notdata));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => '0', 'msg' => $e->getMessage()]);
        }

        return response()->json(['status' => '1', 'msg' => 'Success to stor ']);
    }

}