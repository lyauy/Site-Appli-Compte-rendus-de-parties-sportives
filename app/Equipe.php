<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    public $table = "équipes";

    protected $fillable = [

            'nomclub',
            'nomdirecteur',
            'id_compterendus'
    ];

    public function compterendu()
    {
      return $this->belongsTo(\App\Compterendu::class);
    }
    public function joueur()
    {
      return $this->hasMany(\App\Joueur::class);
    }
    


}