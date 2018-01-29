<?php

namespace App\Repositories;
use Illuminate\Support\Facades\Input;

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
		
		$input = Input::all();
		$condition = $input['nomclub'];

		foreach($condition as $key => $condition)
		{
			$équipe = new Equipe;
			$équipe->nomclub = $input['nomclub'][$key];
			$équipe->nomdirecteur = $input['nomdirecteur'][$key];
			$équipe->save();
		}
	
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