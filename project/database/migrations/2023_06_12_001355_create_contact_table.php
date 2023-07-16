<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cover')->nullable();
            $table->string('name_proprietary');
            $table->string('name_enterprise');
            $table->text('description')->nullable();
            $table->string('address');
            $table->string('e_mail');
            $table->string('telephone_number_1');
            $table->string('telephone_number_2');
            $table->string('telephone_number_3');
            $table->string('profile_facebook');
            $table->string('profile_twitter');
            $table->string('profile_youtube');
            $table->string('profile_mercadolibre');
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
        Schema::dropIfExists('contact');
    }
}
