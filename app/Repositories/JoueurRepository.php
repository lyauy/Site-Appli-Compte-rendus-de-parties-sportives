<?php

namespace App\Repositories;
use Illuminate\Support\Facades\Input;

use App\Compterendu;
use App\Joueur;

class JoueurRepository
{

    protected $joueur;

    public function __construct(Compterendu $compterendu, Joueur $joueur)
	{
		$this->compterendu = $compterendu;
		$this->joueur = $joueur;
	}


	public function store()
	{

		$input = Input::all();
		$condition = $input['fullname'];

		foreach($condition as $key => $condition)
		{
			$joueur = new Joueur;
			$joueur->nolicence = $input['nolicence'][$key];
			$joueur->fullname = $input['fullname'][$key];
			$joueur->id_compterendus = $input['compterendu'][$key];

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