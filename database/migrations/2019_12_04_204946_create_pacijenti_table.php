<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacijentiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacijenti', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ime', 50);
            $table->string('prezime', 100);
            $table->string('adresa', 100);
            $table->string('grad', 50);
            $table->string('telefon', 20);
            $table->string('pol', 1);
            $table->date('datum_rodjenja');
            $table->string('krvna_grupa', 3);
            $table->bigInteger('lbo');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();


            $table->foreign('user_id')
                    ->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacijenti');
    }
}
