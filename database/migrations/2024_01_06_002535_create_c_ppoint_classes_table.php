<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCPpointClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_ppoint_classes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cid');
            $table->bigInteger('gid');
            $table->string('cod');
            // $table->string('pass');
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
        Schema::dropIfExists('c_ppoint_classes');
    }
}
