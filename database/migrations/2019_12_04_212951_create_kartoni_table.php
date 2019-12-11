<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKartoniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kartoni', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('broj_kartona', 20);
            $table->unsignedBigInteger('pacijent_id');
            $table->timestamps();


            $table->foreign('pacijent_id')
                ->references('id')->on('pacijenti')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kartoni');
    }
}
