<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceListesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_listes', function (Blueprint $table) {
            $table->id();
            $table->longText('titre')->nullable();
            $table->longText('texte')->nullable();
            $table->unsignedBigInteger('icon_id');
            $table->foreign('icon_id')->references('id')->on('icons');
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
        Schema::dropIfExists('service_listes');
    }
}
