<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->bigIncrements('idClasse')->nullable(false);
            $table->string('nom',45)->nullable(false);
            $table->string('description',255)->nullable(true);
            $table->string('section',45)->nullable(true);
            $table->char('serie')->nullable(true);
            $table->bigInteger('idSection')->nullable(false);
            $table->foreign('idSection')->references('idSection')->on('section');
            $table->primary('idClasse');
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
        Schema::dropIfExists('classes');
    }
}