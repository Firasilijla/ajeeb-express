<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname')->nullable();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('n_password')->nullable();
            $table->string('phone')->nullable();
            $table->string('passcode')->nullable();
            $table->text('identity')->nullable();
            $table->text('avatar')->nullable();
            $table->boolean('type')->default(2);
            $table->boolean('status')->default(1);
            $table->boolean('is_deleted')->default(false);
            $table->boolean('verify')->default(false);
            $table->string('total_amount')->default(false)->nullable();
            $table->string('total_trx')->default(false)->nullable();
            $table->string('total_bitcoin')->default(false)->nullable();
            $table->string('is_trading')->default(false)->nullable();            
            $table->string('token')->nullable();
            $table->string('token_expire')->nullable();
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
        Schema::dropIfExists('users');
    }
}
