<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('identification_number');
            $table->string('cellphone');
            $table->string('telephone');
            $table->string('address');
            $table->integer('document_type_id')->unsigned();
            $table->integer('gender_id')->unsigned();
            $table->integer('municipality_id')->unsigned();

            $table->foreign('document_type_id')->references('id')->on('document_types');
            $table->foreign('gender_id')->references('id')->on('genders');
            $table->foreign('municipality_id')->references('id')->on('municipalities');

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
        Schema::dropIfExists('profile');
    }
}
