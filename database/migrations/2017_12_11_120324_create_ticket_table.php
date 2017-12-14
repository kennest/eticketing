<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');

            $table->integer('classe_id')->unsigned();
            $table->foreign('classe_id')
                ->references('id')->on('classes')
                ->onDelete('cascade');

            $table->integer('event_id')->unsigned();
            $table->foreign('event_id')
                ->references('id')->on('evenements')
                ->onDelete('cascade');

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
        Schema::dropIfExists('ticket');
    }
}
