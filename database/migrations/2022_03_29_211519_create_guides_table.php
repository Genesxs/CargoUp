<?php

use App\Models\Frontend\Guide;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guides', function (Blueprint $table) {
            $table->id();
            $table->date('date_guide');
            $table->date('date_pick');
            $table->unsignedBigInteger('pick_place_id')->unsigned();
            $table->foreign('pick_place_id')->references('id')->on('pick_places');
            // $table->unsignedBigInteger('destination_id')->unsigned()->nullable();
            // $table->foreign('destination_id')->references('id')->on('destinations');
            $table->integer('iva_id')->unsigned()->nullable();
            $table->foreign('iva_id')->references('id')->on('ivas');
            $table->integer('discount_id')->unsigned()->nullable();
            $table->foreign('discount_id')->references('id')->on('discounts');
            $table->enum('status', [Guide::PENDIENTE, Guide::PAGADA, Guide::ANULADO, Guide::ENTREGADA])->default(Guide::PENDIENTE);
            $table->string('payment_guide')->nullable();
            $table->BigInteger('subtotal')->nullable();
            $table->BigInteger('total')->nullable();
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
        Schema::dropIfExists('detail_guides');
    }
}
