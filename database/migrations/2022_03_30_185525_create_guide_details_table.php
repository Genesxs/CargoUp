<?php

use App\Models\Frontend\GuideDetail;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuideDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guide_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guide_id')->unsigned();
            $table->foreign('guide_id')->references('id')->on('guides');
            $table->enum('type_send', [GuideDetail::PAQUETE, GuideDetail::SOBRE])->default(GuideDetail::PAQUETE);
            $table->integer('cuantity');
            $table->string('content', 500);
            $table->integer('height');
            $table->integer('width');
            $table->integer('length');
            $table->integer('weight');
            $table->integer('price')->nullable();
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
        Schema::dropIfExists('guide_details');
    }
}
