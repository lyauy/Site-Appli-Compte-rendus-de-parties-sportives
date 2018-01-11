<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompterenduTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compterendu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomrencontre');
            $table->date('datematch');
            $table->string('lieu');
            $table->string('typerencontre');
            $table->string('niveau');
            $table->string('club_équipe1');
            $table->string('club_équipe2');
            $table->string('coach_équipe1');
            $table->string('coach_équipe2');
            $table->string('joueurs_équipe1');
            $table->string('joueurs_équipe2');
            $table->binary('publicité');
            $table->string('club_évalué')->nullable($club_évalué = true);
            $table->text('Eval_technique')->nullable($Eval_technique = true);
            $table->text('Eval_physique')->nullable($Eval_physique = true);
            $table->text('Eval_fairplay')->nullable($Eval_fairplay = true);
            $table->integer('note')->nullable($note = true);
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
        Schema::dropIfExists('compterendu');
    }
}
