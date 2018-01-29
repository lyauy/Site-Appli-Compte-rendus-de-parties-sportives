<?php

namespace App\Repositories;

use App\Compterendu;
use App\Equipe;

class EquipeRepository
{

    protected $équipe;

    public function __construct(Compterendu $compterendu, Equipe $équipe)
	{
		$this->compterendu = $compterendu;
		$this->équipe = $équipe;
	}


	public function store()
	{
		
		$équipe = new $this->équipe;		
		
		$équipe->nomclub = Input::get('nomclub');

		$équipes = Input::get('équipe');
		$nb_équipes = array();

		foreach($équipes as $équipe)
		{
			$nb_équipes[] = new Equipe(array(
				'nomclub' => $équipe['nomclub'],
				'nomdirecteur' => $équipe['nomdirecteur'],
				'id_compterendus' => $équipe['compterendu'],
			));
		}

		$équipe->save();
		$équipe->équipes()->saveMany($nb_équipes);

		return $équipe;
	
	}

	public function getById($id)
	{
		return $this->équipe->findOrFail($id);
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