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
        Schema::table('pedidos_itens', function (Blueprint $table) {
            $table->string('status', 30)->index()->nullable()->after('id_produto')->default('Aberto');
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
            $table->dropColumn('status');
        });
    }
};
