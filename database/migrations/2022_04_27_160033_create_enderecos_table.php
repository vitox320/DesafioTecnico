<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logradouro_usuario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_logradouro");
            $table->unsignedBigInteger("id_usuario");

            $table->foreign("id_logradouro")->references("id")->on("logradouros")
                ->onUpdate("cascade")
                ->onDelete("cascade");

            $table->foreign("id_usuario")->references("id")->on("usuarios")
                ->onUpdate("cascade")
                ->onDelete("cascade");
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

        Schema::dropIfExists('logradouro_usuario');
    }
}
