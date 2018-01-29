<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compterendu extends Model
{
    protected $fillable = [
        'nomrencontre', 
        'datematch', 
        'lieu',
        'typerencontre',
		'niveau',
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
        return $this->belongsTo(App\User::class);
    }

    public function équipes() 
    {
        return $this->hasMany(App\Equipe::class);
    }

    public function joueurs() 
    {
        return $this->hasMany(App\Joueur::class);
    }

}
