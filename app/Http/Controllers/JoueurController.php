<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CompterenduCreateRequest;
use App\Http\Requests\CompterenduUpdateRequest;

use App\Http\Requests\JoueurCreateRequest;
use App\Http\Requests\JoueurUpdateRequest;

use App\Repositories\CompterenduRepository;
use App\Repositories\JoueurRepository;

use App\Compterendu;
use App\User;
use App\Catégoriesport;
use App\Joueur;


use Illuminate\Http\Request;

class JoueurController extends Controller
{

    protected $joueurRepository;

    public function __construct(JoueurRepository $joueurRepository)
    {
        $this->joueurRepository = $joueurRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $compterendu = Compterendu::all()->last();
        $user = Auth::User();

        return view('joueur.create', compact('compterendu','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JoueurCreateRequest $request)
    {
        $joueur = $this->joueurRepository->store($request->all());
        $compterendu = Compterendu::all()->last();
        $user = Auth::User();

        return view('compterenduannexe.create', compact('user','compterendu'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->joueurRepository->update($id, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
