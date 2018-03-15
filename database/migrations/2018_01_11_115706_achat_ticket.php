<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AchatTicket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ticket_id')->unsigned();
           
            $table->foreign('ticket_id')
            ->references('id')->on('ticket')
            ->onDelete('cascade');

            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')
            ->references('id')->on('clients')
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
        Schema::dropIfExists('achat');
    }
}
