<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected  $fillable = ['id','user_id', 'quantites','quantites_convert','type', 'withdrow_address', 'withdrow_type','status'];

    public function users()
    {
     return $this->belongsTo('App\Models\User', 'user_id');
    }
    
}
