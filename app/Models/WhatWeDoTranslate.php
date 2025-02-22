<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhatWeDoTranslate extends Model
{
    use HasFactory;

    protected $fillable = ['WhatWeDo_id', 'language', 'title', 'description'];

    public function WhatWeDo()
    {
        return $this->belongsTo(Service::class);
    }
}
