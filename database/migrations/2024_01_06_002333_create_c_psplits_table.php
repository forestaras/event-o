<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCPsplitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_psplits', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cid');
            $table->string('cod');
            $table->string('dovg')->nullable();
            $table->string('shir')->nullable();
            $table->string('time')->nullable();
            $table->string('stat')->nullable();
            $table->string('photo')->nullable();
            $table->string('all')->nullable();
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
        Schema::dropIfExists('c_psplits');
    }
}
