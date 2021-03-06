<?php

namespace App\Repositories;

use App\Compterendu;
use App\User;
use App\Catégoriesport;

class CompterenduRepository
{

    protected $compterendu;

    public function __construct(Compterendu $compterendu, User $user, Catégoriesport $catégoriesport)
	{
		$this->compterendu = $compterendu;
		$this->user = $user;
		$this->catégoriesport = $catégoriesport;
	}

	private function save(Compterendu $compterendu, Array $inputs)
	{
		$compterendu->id_catégoriesports = $inputs['catégoriesport'];
		$compterendu->id_users = $inputs['user'];
		$compterendu->nomrencontre= $inputs['nomrencontre'];
		$compterendu->datematch = $inputs['datematch'];	
		$compterendu->lieu = $inputs['lieu'];
		$compterendu->typerencontre = $inputs['typerencontre'];
		$compterendu->niveau = $inputs['niveau'];
		$compterendu->nomclub1 = $inputs['nomclub1'];
		$compterendu->nomclub2 = $inputs['nomclub2'];	

		$compterendu->save();
	}

	private function save2(Compterendu $compterendu, Array $inputs)
	{	
		$compterendu->renseignement = $inputs['renseignement'];
		$compterendu->club_évalué = $inputs['club_évalué'];	
		$compterendu->eval_physique = $inputs['eval_physique'];
		$compterendu->eval_technique = $inputs['eval_technique'];
		$compterendu->eval_fairplay = $inputs['eval_fairplay'];		
		$compterendu->note = $inputs['note'];	
		//$compterendu->publicité = $inputs['publicité'];	
				

		$compterendu->save();
	}

	public function getPaginate($n)
	{
		return $this->compterendu/*->with('user','catégoriesport')*/
		->orderBy('datematch','desc')
		->paginate($n);
	}

	public function store(Array $inputs)
	{
		$compterendu = new $this->compterendu;		
		$this->save($compterendu, $inputs);

		return $compterendu;
	}

	public function store2(Array $inputs)
	{
		$compterendu = Compterendu::all()->last();	
		$this->save2($compterendu, $inputs);

		return $compterendu;
	}

	public function getById($id)
	{
		return $this->compterendu->findOrFail($id);
	}

	public function update($id, Array $inputs)
	{
		$this->save($this->getById($id), $inputs);
	}

	public function update2($id, Array $inputs)
	{
		$this->save2($this->getById($id), $inputs);
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

}