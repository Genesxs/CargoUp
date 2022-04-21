<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Frontend\Driver;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('url_photo', 200);
            $table->string('url_curriculum', 200);
            $table->integer('experience');
            $table->longText('jobs_name');
            $table->string('score', 4);
            $table->enum('status', [Driver::COMPLETADO, Driver::APROBADO, Driver::DENEGADO])->default(Driver::COMPLETADO);
            $table->Integer('municipality_id')->unsigned();
            $table->foreign('municipality_id')->references('id')->on('municipalities');
            $table->unsignedBigInteger('profile_id');
            $table->foreign('profile_id')->references('id')->on('profiles');
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
        Schema::dropIfExists('drivers');
    }
}
