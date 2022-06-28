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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();

               $table->bigInteger('client_id')->unsigned()->nullable();
            $table->foreign('client_id')->references('id')->on('admins')->onDelete('cascade');

              $table->bigInteger('SocialMediaPlatforms_id')->unsigned()->nullable();
            $table->foreign('SocialMediaPlatforms_id')->references('id')->on('social_media_platforms')->onDelete('cascade');

            $table->bigInteger('ContentType_id')->unsigned()->nullable();
            $table->foreign('ContentType_id')->references('id')->on('content_types')->onDelete('cascade');


             $table->bigInteger('plan_id')->unsigned()->nullable();
            $table->foreign('plan_id')->references('id')->on('clientplans')->onDelete('cascade');
           
              $table->longText('content')->nullable();

             $table->string('image')->nullable();

  $table->bigInteger('addby_id')->unsigned()->nullable();
            $table->foreign('addby_id')->references('id')->on('admins')->onDelete('cascade');

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
        Schema::dropIfExists('contents');
    }
};
