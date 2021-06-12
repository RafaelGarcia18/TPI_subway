<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVegetalSubwaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vegetal_subways', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vegetal_id');
            $table->foreign('vegetal_id')->references('id')->on('tipo_vegetals')->onDelete('cascade');

            $table->unsignedBigInteger('subway_id');
            $table->foreign('subway_id')->references('id')->on('subways')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vegetal_subways');
    }
}
