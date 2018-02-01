<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compterendu extends Model
{
    public $table = "compterendus";

    protected $fillable = [
        'nomrencontre', 
        'datematch', 
        'lieu',
        'typerencontre',
		'niveau',
        'nomclub1',
        'nomclub2',
        'renseignement',
	    'publicité',
		'club_évalué',
		'Eval_technique',
		'Eval_physique',
		'Eval_fairplay',
		'note',
		'id_catégoriesports',
		'id_users'
    ];

    public function users() 
    {
        return $this->belongsTo(App\User::class, 'id_users', 'id');
    }

    public function joueurs() 
    {
        return $this->hasMany(App\Joueur::class, 'id_compterendus', 'id');
    }

}
