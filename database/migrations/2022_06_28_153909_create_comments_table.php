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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
              
        $table->bigInteger('clientsnot_id')->unsigned()->nullable();
        $table->foreign('clientsnot_id')->references('id')->on('clientsnots')->onDelete('cascade');

         $table->bigInteger('content_id')->unsigned()->nullable();
         $table->foreign('content_id')->references('id')->on('contents')->onDelete('cascade');
            $table->timestamps();


           $table->bigInteger('addby_id')->unsigned()->nullable();
         $table->foreign('addby_id')->references('id')->on('admins')->onDelete('cascade');

              $table->longText('comment')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
