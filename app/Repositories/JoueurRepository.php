<?php

namespace App\Repositories;
use Illuminate\Support\Facades\Input;

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

		$input = Input::all();
		$condition = $input['nolicence'];

		foreach($condition as $key => $condition)
		{
			$joueur = new Joueur;
			$joueur->nolicence = $input['nolicence'][$key];
			$joueur->fullname = $input['fullname'][$key];
			$joueur->save();
		}
	
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