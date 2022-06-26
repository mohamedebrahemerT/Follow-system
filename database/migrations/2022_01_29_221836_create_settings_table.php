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
            $table->id();
             $table->string('name')->nullable();
             $table->string('Fivacon')->nullable();
             
             $table->string('logo')->nullable();
            $table->integer('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('copy_right')->nullable();

            $table->string('about_title')->nullable();
            $table->longText('about_desc')->nullable();
            $table->string('about_img')->nullable();

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
