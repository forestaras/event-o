<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCPcompetitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_pcompetitors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cid');
            $table->string('name');
            $table->string('team')->nullable();
            $table->string('class')->nullable();
            $table->string('rt')->nullable();
            $table->string('st')->nullable();
            $table->string('fn')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('c_pcompetitors');
    }
}
