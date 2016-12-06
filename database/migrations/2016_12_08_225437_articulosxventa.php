<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Articulosxventa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Articulosxventa', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');
            $table->integer('id_articulos')->unsigned();
            $table->integer('id_ventas')->unsigned();
            $table->timestamps();

            $table->foreign('id_articulos')
            ->references('id')->on('articulos')
            ->onDelete('cascade');

            $table->foreign('id_ventas')
            ->references('id')->on('ventas')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Articulosxventa');
    }
}
