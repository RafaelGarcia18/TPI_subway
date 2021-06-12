<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAderesoSubwaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adereso_subways', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('adereso_id');
            $table->foreign('adereso_id')->references('id')->on('tipo_aderesos')->onDelete('cascade');

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
        Schema::dropIfExists('adereso_subways');
    }
}
