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
        Schema::create('compterendus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_catégoriesports');
            $table->string('nomrencontre');
            $table->date('datematch');
            $table->string('lieu');
            $table->string('typerencontre');
            $table->string('niveau');
            $table->text('renseignement')->nullable($renseignement = true);
            $table->binary('publicité')->nullable($publicité = true);
            $table->string('club_évalué')->nullable($club_évalué = true);
            $table->text('eval_technique')->nullable($eval_technique = true);
            $table->text('eval_physique')->nullable($eval_physique = true);
            $table->text('eval_fairplay')->nullable($eval_fairplay = true);
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
        Schema::dropIfExists('compterendus');
    }
}
