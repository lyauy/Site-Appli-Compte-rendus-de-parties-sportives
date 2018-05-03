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

	public function save_update()
	{
		$joueur->nolicence = $input['nolicence'];
		$joueur->fullname = $input['fullname'];
		$joueur->id_compterendus = $input['compterendu'];

		$joueur->save();
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

		foreach($id as $i => $id){
			if($joueur->id_compterendus == $compterendu->id)
				$this->save_update($this->getById($id), $inputs);
		}

	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

}