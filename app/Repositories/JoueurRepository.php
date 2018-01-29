<?php

namespace App\Repositories;

use App\Compterendu;
use App\Equipe;
use App\Joueur;

class JoueurRepository
{

    protected $joueur;

    public function __construct(Compterendu $compterendu, Equipe $équipe, Joueur $joueur)
	{
		$this->compterendu = $compterendu;
		$this->équipe = $équipe;
		$this->joueur = $joueur;
	}


	public function store()
	{
		$joueur = new $this->joueur;		
		
		$joueur->nolicence = Input::get('nolicence');

		$joueurs = Input::get('joueur');
		$nb_joueurs = array();

		foreach($joueurs as $joueur)
		{
			$nb_joueurs[] = new Joueur(array(
				'nolicence' => $joueur['nolicence'],
				'fullname' => $joueur['fullname'],
				'id_équipes' => $joueur['équipe'],
				'id_compterendus' => $joueur['compterendu'],
			));
		}

		$joueur->save();
		$joueur->joueurs()->saveMany($nb_joueurs);

		return $joueur;
	}

	public function getById($id)
	{
		return $this->joueur->findOrFail($id);
	}

	public function update($id, Array $inputs)
	{
		$this->save($this->getById($id), $inputs);
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

}