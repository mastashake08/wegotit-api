<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDropOffLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drop_off_locations', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('business_id');
          $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');
          $table->string('location');
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
        Schema::dropIfExists('drop_off_locations');
    }
}
