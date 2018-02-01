<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Joueur extends Model
{
    public $table = "joueurs";

    protected $fillable = [

            'nolicence',
            'fullname',
            'id_compterendus'

    ];

    public function compterendu()
    {
      return $this->belongsTo(\App\Compterendu::class, 'id_compterendus', 'id');
    }

}
