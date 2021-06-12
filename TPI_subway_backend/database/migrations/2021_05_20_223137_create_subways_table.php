<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubwaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subways', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('pan_id');
            $table->foreign('pan_id')->references('id')->on('tipo_pans');

            $table->unsignedBigInteger('queso_id');
            $table->foreign('queso_id')->references('id')->on('tipo_quesos');

            $table->unsignedBigInteger('carne_id');
            $table->foreign('carne_id')->references('id')->on('tipo_carnes');




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
        Schema::dropIfExists('subways');
    }
}
