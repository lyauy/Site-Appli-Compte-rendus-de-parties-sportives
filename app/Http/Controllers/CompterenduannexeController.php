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

class CompterenduannexeController extends Controller
{

    protected $compterenduRepository;

    public function __construct(CompterenduRepository $compterenduRepository)
    {
        $this->compterenduRepository = $compterenduRepository;
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
        $compterendu = Compterendu::all()->last()->id;
        $user = Auth::User();

        return view('compterendu.create3', compact('compterendu','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::User();
        $compterendu = $this->compterenduRepository->store2($request->all());
        $compterendu = Compterendu::all()->last();

        return redirect('home')->withOk("La feuille de match a été créée.");
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
        //
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
