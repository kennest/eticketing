<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvenementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evenements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('uuid');
            $table->string('description');
            $table->integer('tickets');
            $table->string('picture');
            $table->date('begin');
            $table->date('end');

            $table->integer('admin_id')->unsigned();
            $table->foreign('admin_id')
                ->references('id')->on('admins')
                ->onDelete('cascade');

            $table->integer('lieu_id')->unsigned();
            $table->foreign('lieu_id')
                ->references('id')->on('lieux')
                ->onDelete('cascade');

            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')
                ->references('id')->on('types')
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
        Schema::dropIfExists('evenements');
    }
}
