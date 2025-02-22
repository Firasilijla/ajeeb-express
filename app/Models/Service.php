<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['image'];

    public function translations()
    {
        return $this->hasMany(ServiceTranslation::class);
    }

     
  
      // الحصول على الترجمة بناءً على اللغة الحالية
      public function getTranslation()
      {
  
          return $this->translations()->where('language', config('app.locale'))->first();
      }
}
