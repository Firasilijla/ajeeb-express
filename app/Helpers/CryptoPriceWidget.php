<?php

namespace App\Helpers;

use App\Events\UserAccept;
use App\Models\UserNotification;
use DateTime;
use GuzzleHttp\Client;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CryptoPriceWidget
{

    public static function getLiveCryptoPrices()
    {
        // $client = new Client();
        // $response = $client->get('https://api.example.com/crypto-prices'); // قم بوضع رابط API الذي يقدم بيانات العملات الرقمية
        // $cryptoPrices = json_decode($response->getBody(), true); // البيانات المستلمة من الطلب في شكل مصفوفة
        // return $cryptoPrices;
    }
}