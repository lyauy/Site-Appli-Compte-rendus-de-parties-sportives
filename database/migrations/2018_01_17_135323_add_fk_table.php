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
        Schema::table('compterendus', function (Blueprint $table) {
            $table->integer('id_users')->unsigned()->nullable();
            //$table->integer('id_catégoriesports')->nullable()->unsigned();
            $table->foreign('id_users')->references('id')->on('users');
            //$table->foreign('id_catégoriesports')->references('id')->on('catégoriesports');
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->integer('id_users')->unsigned()->nullable();
            $table->integer('id_compterendus')->unsigned()->nullable();
            $table->foreign('id_users')->references('id')->on('users');
            $table->foreign('id_compterendus')->references('id')->on('compterendus')->onUpdate('cascade')->onDelete('cascade');
        });


        Schema::table('joueurs', function (Blueprint $table) {
            $table->integer('id_compterendus')->unsigned()->nullable();
            $table->foreign('id_compterendus')->references('id')->on('compterendus')->onUpdate('cascade')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('compterendus', function (Blueprint $table) {
            
        });

        Schema::table('comments', function (Blueprint $table) {
            
        });

        Schema::table('joueurs', function (Blueprint $table) {
            
        });
    }
}
