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
        Schema::table('contents', function (Blueprint $table) {
            //
             
              $table->enum('ContentMangerConfirm',[0,1])->default(0)->nullable();
              $table->enum('Contentclientconfirm',[0,1])->default(0)->nullable();
              $table->enum('acountmangerDesignConfirm',[0,1])->default(0)->nullable();
              $table->enum('clientDesignConfirm',[0,1])->default(0)->nullable();

               $table->enum('status', 
                [
                     'ContentMangerConfirm',
                      'Contentclientconfirm',
                     'acountmangerDesignConfirm',
                     'clientDesignConfirm',
                 ])->default('ContentMangerConfirm');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contents', function (Blueprint $table) {
            //
        });
    }
};
