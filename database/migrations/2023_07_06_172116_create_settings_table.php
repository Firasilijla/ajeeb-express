<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Qr_image_teh')->nullable();
            $table->string('Qr_image_btc')->nullable();
            $table->string('Qr_image_eth')->nullable();
            $table->string('Qr_image_ltc')->nullable();
            $table->string('Qr_image_trx')->nullable();

            $table->string('Qr_address_teh')->unique();
            $table->string('Qr_address_btc')->unique();
            $table->string('Qr_address_eth')->unique();
            $table->string('Qr_address_ltc')->unique();
            $table->string('Qr_address_trx')->unique();

            $table->string('location')->nullable();
            $table->string('email')->nullable();
            $table->string('telegram')->nullable();
            $table->string('whatsapp')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
