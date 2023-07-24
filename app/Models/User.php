<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;
    protected  $fillable = ['fname', 'lname','username','email', 'phone','passcode','identity', 'avatar','password','n_password','type','status','is_deleted','verify','total_amount','total_trx','total_bitcoin','is_trading'];

    public function getTypeAttribute()
    {
        if ($this->attributes['type'] === 2) {
            return "user";
        }
        if ($this->attributes['type'] === 1) {
            return "admin";
        }
    }


    public function getIdentityAttribute()
    {
       return asset($this->attributes['identity']);
    }
    public function getAvatarAttribute()
    {
       return asset($this->attributes['avatar']);
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class,'user_id', 'id');
    }
}

