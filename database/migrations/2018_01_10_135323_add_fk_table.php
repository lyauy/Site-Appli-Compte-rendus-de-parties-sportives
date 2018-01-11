<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('compterendu', function (Blueprint $table) {
            $table->integer('id_users')->nullable()->unsigned();
            $table->integer('id_catégoriesport')->nullable()->unsigned();
            $table->foreign('id_users')->references('id')->on('users');
            $table->foreign('id_catégoriesport')->references('id')->on('catégoriesport');
        });

        Schema::table('commentaire', function (Blueprint $table) {
            $table->integer('id_users')->nullable()->unsigned();
            $table->integer('id_compterendu')->nullable()->unsigned();
            $table->foreign('id_users')->references('id')->on('users');
            $table->foreign('id_compterendu')->references('id')->on('compterendu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('compterendu', function (Blueprint $table) {
            
        });

        Schema::table('commentaire', function (Blueprint $table) {
            
        });
    }
}
