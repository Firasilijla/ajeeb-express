<?php

namespace Database\Seeders;

use App\Models\WhyUs;
use Illuminate\Database\Seeder;

class WhyUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     // إضافة بيانات إلى جدول why_us
     $whyUs1 = WhyUs::create([
        'image' => 'path/to/image1.jpg',
    ]);

    // إضافة الترجمات إلى جدول why_us_translations
    $whyUs1->translations()->create([
        'language' => 'en',
        'title' => 'Why Choose Us?',
        'description' => 'We provide exceptional service with a commitment to quality and customer satisfaction.',
    ]);

    $whyUs1->translations()->create([
        'language' => 'ar',
        'title' => 'لماذا تختارنا؟',
        'description' => 'نحن نقدم خدمة استثنائية مع التزام بالجودة ورضا العملاء.',
    ]);

    // إضافة بيانات أخرى مشابهة
    $whyUs2 = WhyUs::create([
        'image' => 'path/to/image2.jpg',
    ]);

    $whyUs2->translations()->create([
        'language' => 'en',
        'title' => 'Our Mission',
        'description' => 'Our mission is to deliver value and excellence through innovative solutions.',
    ]);

    $whyUs2->translations()->create([
        'language' => 'ar',
        'title' => 'مهمتنا',
        'description' => 'مهمتنا هي تقديم القيمة والتميز من خلال الحلول المبتكرة.',
    ]);
    }
}
