<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients_social_media_platforms', function (Blueprint $table) {
            $table->id();
             $table->bigInteger('client_id')->unsigned()->nullable();
            $table->foreign('client_id')->references('id')->on('admins')->onDelete('cascade');

             $table->bigInteger('SocialMediaPlatforms_id')->unsigned()->nullable();
            $table->foreign('SocialMediaPlatforms_id')->references('id')->on('social_media_platforms')->onDelete('cascade');

             


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
        Schema::dropIfExists('clients_social_media_platforms');
    }
};
