
@extends('interfaces.template')
@extends('layouts.app')

@section('contenu')
    @include('interfaces.header')
    <br>
        <div class="col-sm-offset-4 col-sm-4">
            @if(session()->has('ok'))
                <div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
            @endif
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Comptes-rendus sportifs dernièrement</h3>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sport</th>
                                <th>Rencontre</th>
                                <th>Auteur</th>
                                <th>Date du match</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>                       
                        @foreach ($compterendus as $compterendu)
                            <tr>
                                <td>{!! $compterendu->id_catégoriesports !!}</td>
                                <td>{!! $compterendu->nomrencontre !!}</td>
                                <td class="text-primary"><strong>
                                    @foreach ($users as $user)
                                        @if($user->id == $compterendu->id_users)                           
                                            {!! $user->name !!}
                                            @if($user->certified == 1)
                                                <img src="https://www.shareicon.net/data/128x128/2016/02/10/285144_emblem_32x32.png">
                                            @endif
                                        @endif
                                    @endforeach
                                </strong></td>
                                <td>{!! $compterendu->datematch !!}</td>                                    
                                <td>{!! link_to_route('compterendu.show', 'Voir', [$compterendu->id], ['class' => 'btn btn-success btn-block']) !!}</td>
                                @if ($authuser == $compterendu->id_users)               
                                    <td>{!! link_to_route('compterendu.edit', 'Modifier', [$compterendu->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['compterendu.destroy', $compterendu->id]]) !!}
                                            {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Supprimer ce compte-rendu ?\')']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                @endif
                            </tr>
                        @endforeach                          
                    </tbody>
                </table>
            </div>           
                @if(Route::has('login'))
                
                    @auth                       
                        {!! link_to_route('compterendu.create', 'Nouveau compte-rendu', [], ['class' => 'btn btn-info pull-right']) !!}
                        {!! $links !!}
                    @else
                        <p align="center">Veuillez vous connecter pour rédiger un compte-rendu !</p>
                    @endauth
                                   
                @endif       
        </div>
                    
@endsection