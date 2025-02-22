<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhyUsTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('why_us_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('why_us_id')->constrained('why_us')->onDelete('cascade');  // علاقة مع جدول why_us
            $table->enum('language', ['en', 'ar']);  // اللغة
            $table->string('title');  // العنوان
            $table->text('description');  // الوصف
            $table->timestamps();
        });
    }

    public function down()
    {
  
    }
}
