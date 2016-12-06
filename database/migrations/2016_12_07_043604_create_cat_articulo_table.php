<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatArticuloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_articulo', function (Blueprint $table) {
            $table->integer('id_categoria')->unsigned();
            $table->integer('id_articulo')->unsigned();
            $table->primary(array('id_categoria', 'id_articulo'));
            $table->timestamps();

            $table->foreign('id_categoria')
            ->references('id')->on('categorias')
            ->onDelete('cascade');

            $table->foreign('id_articulo')
            ->references('id')->on('articulos')
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
        Schema::drop('cat_articulo');
    }
}
