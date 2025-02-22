<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyUsTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['why_us_id', 'language', 'title', 'description'];  // البيانات القابلة للتعبئة

    // علاقة مع جدول why_us
    public function whyUs()
    {
        return $this->belongsTo(WhyUs::class);
    }
}
