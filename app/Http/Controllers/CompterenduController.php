<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CompterenduCreateRequest;
use App\Http\Requests\CompterenduUpdateRequest;

/*use App\Http\Requests\EquipeCreateRequest;
use App\Http\Requests\EquipeUpdateRequest;

use App\Http\Requests\JoueurCreateRequest;
use App\Http\Requests\JoueurUpdateRequest;*/

use App\Repositories\CompterenduRepository;
/*use App\Repositories\EquipeRepository;
use App\Repositories\JoueurRepository;*/

use App\User;
use App\Catégoriesport;
/*use App\Equipe;
use App\Joueur;*/


use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Input;

class CompterenduController extends Controller
{

	protected $compterenduRepository;

    protected $nbrPerPage = 15;

    public function __construct(CompterenduRepository $compterenduRepository/*, EquipeRepository $equipeRepository, JoueurRepository $joueurRepository*/)
    {
		$this->compterenduRepository = $compterenduRepository;
		/*$this->equipeRepository = $equipeRepository;
		$this->joueurRepository = $joueurRepository;*/
	}

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    
	public function index()
	{
		$users = User::all();
		$compterendus = $this->compterenduRepository->getPaginate($this->nbrPerPage);
		$links = $compterendus->render();

		return view('compterendu.index', compact('compterendus', 'users', 'links'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$catégoriesports = Catégoriesport::all()->sortBy('libellésport');
		$user = Auth::User();
		/*$équipes = Equipe::all();
		$joueurs = Joueur::all();*/
		return view('compterendu.create', compact('catégoriesports','user'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CompterenduCreateRequest $request1 /*, EquipeCreateRequest $request2, JoueurCreateRequest $request3*/)
	{
		$compterendu = $this->compterenduRepository->store($request1->all());
		/*$équipe = $this->equipeRepository->store($request2->all());
		$joueur = $this->joueurRepository->store($request3->all());*/

		return redirect('home')->withOk("La feuille de match a été créée.");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$compterendu = $this->compterenduRepository->getById($id);
		$users = User::All();
		/*$équipe = $this->equipeRepository->getById($id);
		$joueur = $this->joueurRepository->getById($id);*/

		return view('compterendu.show',  compact('compterendu','users'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$compterendu = $this->compterenduRepository->getById($id);
		/*$équipe = $this->equipeRepository->getById($id);
		$joueur = $this->joueurRepository->getById($id);*/

		return view('compterendu.edit',  compact('compterendu'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(CompterenduCreateRequest $request1/*, EquipeCreateRequest $request2, JoueurCreateRequest $request3*/)
	{
		$this->compterenduRepository->update($id, $request1->all());
		/*$this->equipeRepository->update($id, $request2->all());
		$this->joueurRepository->update($id, $request3->all());*/
		
		return redirect('compterendu')->withOk("La feuille de match a été modifiée");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->compterenduRepository->destroy($id);
		/*$this->equipeRepository->destroy($id);
		$this->joueurRepository->destroy($id);*/

		return back();
	}

}

