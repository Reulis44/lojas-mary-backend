<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pedidos_itens', function (Blueprint $table){
            $table->foreign('id_pedido')->references('id')->on('pedidos')->onDelete('set null');
            $table->foreign('id_produto')->references('id')->on('produtos')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pedidos_itens', function (Blueprint $table) {
            $table->dropForeign(['id_pedido', 'id_produto']);
    });
    }
};
