<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ime', 50);
            $table->string('prezime', 100);
            $table->string('telefon', 20);
            $table->string('email', 100)->unique();
            $table->string('username', 50);
            $table->string('password');
            $table->boolean('active')->default(1);
            $table->unsignedBigInteger('uloga_id')->default(2);
            // $table->timestamp('email_verified_at')->nullable();
            // $table->rememberToken();
            $table->timestamps();

            $table->foreign('uloga_id')
                    ->references('id')->on('uloge');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
