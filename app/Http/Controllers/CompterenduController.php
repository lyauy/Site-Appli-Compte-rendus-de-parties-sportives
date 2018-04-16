<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CompterenduCreateRequest;
use App\Http\Requests\CompterenduUpdateRequest;

use App\Http\Requests\JoueurCreateRequest;
use App\Http\Requests\JoueurUpdateRequest;

use App\Repositories\CompterenduRepository;
use App\Repositories\JoueurRepository;

use App\Http\Controllers\CommentsController;
use App\Compterendu;
use App\User;
use App\Catégoriesport;
use App\Joueur;
use App\Comment;


use Illuminate\Http\Request;


class CompterenduController extends Controller
{

	protected $compterenduRepository;

    protected $nbrPerPage = 15;

    public function __construct(CompterenduRepository $compterenduRepository, JoueurRepository $joueurRepository, CommentsController $CommentsController)
    {
		$this->compterenduRepository = $compterenduRepository;
		$this->joueurRepository = $joueurRepository;
		$this->CommentsController = $CommentsController;
	}

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    
	public function index()
	{
		$users = User::all();
		$auth = Auth::User();
		$compterendus = $this->compterenduRepository->getPaginate($this->nbrPerPage);
		$links = $compterendus->render();

		return view('compterendu.index', compact('compterendus', 'users', 'auth', 'links'));
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

		return view('compterendu.create', compact('catégoriesports','user'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CompterenduCreateRequest $request1)
	{
		$user = Auth::User();
		$compterendu = $this->compterenduRepository->store($request1->all());
		$compterendu = Compterendu::all()->last();

		return view('joueur.create', compact('compterendu','user'));
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
		$joueurs = Joueur::All();

		return view('compterendu.show',  compact('compterendu','users','joueurs'));
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
		$catégoriesports = Catégoriesport::all();
		$joueurs = Joueur::All();

		return view('compterendu.edit',  compact('compterendu','joueurs', 'catégoriesports'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(CompterenduCreateRequest $request, $id)
	{
		$this->compterenduRepository->update($id, $request->all());
		
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
		$joueurs = Joueur::All();
		$comments = Comment::All();
		$this->compterenduRepository->destroy($id);
		foreach ($joueurs as $joueur){
			if ($joueur->id_compterendu == $id)
				$this->joueurRepository->destroy($id);
		}
		foreach ($comments as $comment){
			if ($comment->commentable_id == $id)
				$this->CommentsController->destroy($id);
		}
		return back();
	}

}

