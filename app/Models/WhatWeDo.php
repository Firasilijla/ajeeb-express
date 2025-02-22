<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhatWeDo extends Model
{
    use HasFactory;

    protected $fillable = ['image'];

    public function translations()
    {
        return $this->hasMany(WhatWeDoTranslate::class);
    }

     
  
      // الحصول على الترجمة بناءً على اللغة الحالية
      public function getTranslation()
      {
  
          return $this->translations()->where('language', config('app.locale'))->first();
      }
}
