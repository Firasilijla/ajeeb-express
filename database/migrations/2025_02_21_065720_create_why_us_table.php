<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhyUsTable extends Migration
{

    public function up()
    {
        Schema::create('why_us', function (Blueprint $table) {
            $table->id();
            $table->string('image');  
            $table->integer('orders_delivered')->default(0); // عدد الطلبات المُسلمة
            $table->integer('satisfied_clients')->default(0); // عدد العملاء السعداء
            $table->timestamps();
        });
    }

    public function down()
    {


    }
}
