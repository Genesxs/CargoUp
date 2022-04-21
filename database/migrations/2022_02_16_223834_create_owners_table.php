<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Frontend\Owner;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->string('url_credit', 200);
            $table->enum('type_payment', [Owner::CONTADO, Owner::CREDITO])->default(Owner::CONTADO);
            $table->enum('status', [Owner::PENDIENTE, Owner::COMPLETADO, Owner::APROBADO, Owner::DENEGADO])->default(Owner::PENDIENTE);
            $table->string('account_number', 45)->nullable();
            $table->string('url_bank_certificate', 200);
            $table->string('url_identity', 1000);
            $table->string('url_photo', 200);
            $table->string('url_document_approved', 200)->nullable();
            $table->unsignedBigInteger('profile_id');
            $table->foreign('profile_id')->references('id')->on('profiles');
            $table->unsignedInteger('type_account_id')->nullable();
            $table->foreign('type_account_id')->references('id')->on('type_accounts');
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->foreign('bank_id')->references('id')->on('banks');
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
        Schema::dropIfExists('owners');
    }
}
