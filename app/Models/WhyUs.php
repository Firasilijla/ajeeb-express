<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class WhyUs extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'orders_delivered', 'satisfied_clients'];  // البيانات القابلة للتعبئة

    // علاقة مع جدول الترجمات
    public function translations()
    {
        return $this->hasMany(WhyUsTranslation::class);
    }

    // الحصول على الترجمة بناءً على اللغة الحالية
    public function getTranslation()
    {

        return $this->translations()->where('language', config('app.locale'))->first();
    }
}
