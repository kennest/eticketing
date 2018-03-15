<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string('profession');
            $table->integer('admin_id')->unsigned();
            $table->foreign('admin_id')
                ->references('id')->on('admins')
                ->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('evenement_participant', function (Blueprint $table) {
            $table->integer('evenement_id')->unsigned();
            $table->foreign('evenement_id')
                ->references('id')->on('evenements')
                ->onDelete('cascade');
            $table->integer('participant_id')->unsigned();
            $table->foreign('participant_id')
                    ->references('id')->on('participants')
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
        Schema::dropIfExists('participants');
        Schema::dropIfExists('evenement_participant');
    }
}
