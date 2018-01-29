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
            $table->integer('id_users')->nullable()->unsigned();
            //$table->integer('id_catégoriesports')->nullable()->unsigned();
            $table->foreign('id_users')->references('id')->on('users');
            //$table->foreign('id_catégoriesports')->references('id')->on('catégoriesports');
        });

        Schema::table('commentaires', function (Blueprint $table) {
            $table->integer('id_users')->nullable()->unsigned();
            $table->integer('id_compterendus')->nullable()->unsigned();
            $table->foreign('id_users')->references('id')->on('users');
            $table->foreign('id_compterendus')->references('id')->on('compterendus');
        });

        Schema::table('équipes', function (Blueprint $table) {
            $table->integer('id_compterendus')->nullable()->unsigned();
            $table->foreign('id_compterendus')->references('id')->on('compterendus');
        });

        Schema::table('joueurs', function (Blueprint $table) {
            $table->integer('id_équipes')->nullable()->unsigned();
            $table->integer('id_compterendus')->nullable()->unsigned();
            $table->foreign('id_équipes')->references('id')->on('équipes');
            $table->foreign('id_compterendus')->references('id')->on('compterendus');
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

        Schema::table('commentaires', function (Blueprint $table) {
            
        });

        Schema::table('équipes', function (Blueprint $table) {
            
        });

        Schema::table('joueurs', function (Blueprint $table) {
            
        });
    }
}
