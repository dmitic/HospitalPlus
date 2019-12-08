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
            $table->integer('broj_kartona');
            $table->unsignedBigInteger('pacijent_id');
            $table->timestamps();


            $table->foreign('pacijent_id')
                ->references('id')->on('pacijenti');
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
