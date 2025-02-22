<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhatWeDoTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('what_we_do_translates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('what_we_do_id')->constrained('what_we_dos')->onDelete('cascade');  // العلاقة مع جدول services
            $table->string('language');  // اللغة
            $table->string('title');     // العنوان
            $table->text('description'); // الوصف
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
        Schema::dropIfExists('what_we_do_translates');
    }
}
