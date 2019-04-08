<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCheckout extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkout', function (Blueprint $table) {
          $table->increments('id');
          $table->string('firstname')->nullable();
          $table->string('lastname')->nullable();
          $table->string('company')->nullable();
          $table->string('phone')->nullable();
          $table->string('email')->nullable();
          $table->string('country')->nullable();
          $table->string('adressone')->nullable();
          $table->string('adresstwo')->nullable();
          $table->string('city')->nullable();
          $table->string('district')->nullable();
          $table->string('postcode')->nullable();
          $table->integer('total')->nullable();
          $table->unsignedInteger('user_id')->nullable();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('checkout');
    }
}
