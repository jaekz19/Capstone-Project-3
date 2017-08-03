<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tnum')->unsigned();
            $table->string('tname');
            $table->integer('creator_id')->unsigned();
            $table->integer('tmod_id')->unsigned();
            $table->integer('tsub_id')->unsigned();
            $table->integer('supp_id')->unsigned();
            $table->text('content');
            $table->integer('tstatus_id')->unsigned();
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
        Schema::dropIfExists('tickets');
    }
}
