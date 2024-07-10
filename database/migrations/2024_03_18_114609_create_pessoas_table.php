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
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_profissao')->unsigned()->nullable();
            $table->string('tipo_cadastro', 15)->nullable();
            $table->string('nome', 40)->nullable();
            $table->string('cpf', 11)->nullable();
            $table->date("data_nascimento")->nullable();
            $table->string('email', 200)->nullable();
            $table->string('genero', 20)->nullable();
            $table->string('estado_civil', 20)->nullable();
            $table->string('rua', 200)->nullable();
            $table->string('numero', 20)->nullable();
            $table->string('complemento', 100)->nullable();
            $table->string('bairro', 100)->nullable();
            $table->string('cidade', 30)->nullable();
            $table->string('uf', 5)->nullable();
            $table->string('cep', 8)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoas');
    }
};
