<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Joueur extends Model
{
    public $table = "joueurs";

    protected $fillable = [

            'nolicence',
            'fullname',
            'id_compterendus',
            'id_équipes'

    ];

    public function compterendu()
    {
      return $this->belongsTo(\App\Compterendu::class);
    }

    public function équipe()
    {
      return $this->belongsTo(\App\Equipe::class);
    }
}
