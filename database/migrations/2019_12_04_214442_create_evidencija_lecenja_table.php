<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvidencijaLecenjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evidencija_lecenja', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('karton_id');
            $table->date('datum_posete');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('bolest_id');
            $table->bigInteger('kolicina');
            $table->text('opis');
            $table->unsignedBigInteger('lek_id');
            $table->timestamps();

            $table->foreign('karton_id')
                    ->references('id')->on('kartoni');
            $table->foreign('user_id')
                    ->references('id')->on('users');
            $table->foreign('bolest_id')
                    ->references('id')->on('bolesti');
            $table->foreign('lek_id')
                    ->references('id')->on('lekovi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evidencija_lecenja');
    }
}
