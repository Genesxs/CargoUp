<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotas', function (Blueprint $table) {
            $table->id();
            $table->integer('quota_number');
            $table->float('price', 10, 2)->nullable();
            // $table->foreignId('type_vehicle_id')->constrained('type_vehicles');
            // $table->bigInteger('type_vehicle_id')->unsigned()->foreing('type_vehicles', 'id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('quotas');
    }
}
