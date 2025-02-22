<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected  $fillable = [
        'Qr_trc_image_teh',
        'Qr_image_btc',
        'Qr_image_eth',
        'Qr_image_ltc',
        'Qr_image_trx',

        'Qr_erc_image_teh',
        'Qr_trc_address_teh',
        'Qr_erc_address_teh',
        'Qr_address_btc',
        'Qr_address_eth',
        'Qr_address_ltc',
        'Qr_address_trx',


        'location',
        'email',
        'telegram',
        'whatsapp'

    ];


    // public function getQrImageTrcAttribute()
    // {
    //     return  asset($this->attributes['Qr_image_trc']);
    // }
    // public function getQrImageErcAttribute()
    // {
    //     return  asset($this->attributes['Qr_image_erc']);
    // }
    // -------------- 
    public function getQrTrcImageTehAttribute()
    {
        return  asset("public/" . $this->attributes['Qr_trc_image_teh']);
    }
    public function getQrImageBtcAttribute()
    {
        return  asset("public/" . $this->attributes['Qr_image_btc']);
    }
    public function getQrImageEthAttribute()
    {
        return  asset("public/" . $this->attributes['Qr_image_eth']);
    }
    public function getQrImageLtcAttribute()
    {
        return  asset("public/" . $this->attributes['Qr_image_ltc']);
    }
    public function getQrImageTrxAttribute()
    {
        return  asset("public/" . $this->attributes['Qr_image_trx']);
    }
    public function getQrErcImageTehAttribute()
    {
        return  asset("public/" . $this->attributes['Qr_trc_image_teh']);
    }
}
