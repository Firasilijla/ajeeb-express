<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected  $fillable = [
        'Qr_image_teh',
        'Qr_image_btc',
        'Qr_image_eth',
        'Qr_image_ltc',
        'Qr_image_trx',

        'Qr_address_teh',
        'Qr_address_btc',
        'Qr_address_eth',
        'Qr_address_ltc',
        'Qr_address_trx',


        'location',
        'email',
        'telegram',
        'whatsapp' 

    ];


    public function getQrImageTrcAttribute()
    {
        return  asset($this->attributes['Qr_image_trc']);
    }
    public function getQrImageErcAttribute()
    {
        return  asset($this->attributes['Qr_image_erc']);
    }
}
