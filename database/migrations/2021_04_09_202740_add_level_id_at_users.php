<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLevelIdAtUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //esta migracion crea un unico campo, no una tabla
        Schema::table('users', function (Blueprint $table) {
            //recibe nulos, por si el sistema esta en produccion o la db con datos
            $table->bigInteger('level_id')->unsigned()
            ->nullable()
            //posicion del campo en la tabla
            ->after('id');

            $table->foreign('level_id')->references('id')->on('levels')
            //seteamos como nulos, para que no se borren los usuarios
            ->onDelete('set null')
            ->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
