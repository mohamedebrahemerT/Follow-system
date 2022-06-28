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
        Schema::create('clientplans', function (Blueprint $table) {
            $table->id();
              $table->string('name')->nullable();
              $table->longText('content')->nullable();
              $table->string('date')->nullable();
             $table->bigInteger('client_id')->unsigned()->nullable();
            $table->foreign('client_id')->references('id')->on('admins')->onDelete('cascade');
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
        Schema::dropIfExists('clientplans');
    }
};
