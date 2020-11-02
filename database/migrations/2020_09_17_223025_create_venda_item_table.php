<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendaItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venda_item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('venda_id')->unsigned();
            $table->foreign('venda_id')->on('vendas')->references('id');
            $table->integer('produto_id')->unsigned();
            $table->foreign('produto_id')->on('produtos')->references('id');
            $table->decimal('preco');
            $table->integer('quantidade');
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
        Schema::dropIfExists('venda_item');
    }
}
