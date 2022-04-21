<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuideDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guide_destinations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('destination_id')->unsigned();
            $table->foreign('destination_id')->references('id')->on('destinations');
            $table->unsignedBigInteger('guide_detail_id')->unsigned();
            $table->foreign('guide_detail_id')->references('id')->on('guide_details');
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
        Schema::dropIfExists('guide_destinations');
    }
}
