<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactAdressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_adresses', function (Blueprint $table) {
            $table->id();
            $table->string('rue')->nullable();
            $table->integer('numero')->nullable();
            $table->string('commune')->nullable();
            $table->integer('code_postale')->nullable();
            $table->string('tel')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('contact_adresses');
    }
}
