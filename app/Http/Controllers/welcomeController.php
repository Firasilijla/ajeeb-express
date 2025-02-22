<?php

namespace App\Http\Controllers;

use App\Models\WhyUs;
use Illuminate\Http\Request;

class welcomeController extends Controller
{
    public function index()
    {
        $language = app()->getLocale();
        $whyUs = WhyUs::first();
        $translation = $whyUs->translations()->where('language', $language)->first();
        $whyUsData = [
            'id' => $whyUs->id,
            'image' => $whyUs->image,
            'orders_delivered' => $whyUs->orders_delivered,
            'satisfied_clients' => $whyUs->satisfied_clients,
            'translation' => [
                'title' => $translation ? $translation->title : null,
                'description' => $translation ? $translation->description : null
            ]
        ];
    
        
        return view("welcome",compact('whyUsData'));
    }
}
