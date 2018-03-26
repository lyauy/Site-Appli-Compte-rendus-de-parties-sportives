@extends('interfaces.template')
@extends('layouts.app')

@section('contenu')
    @include('interfaces.header')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <h2 align="center">Nouveau compte-rendu</h2>
    <div class="col-sm-offset-4 col-sm-4">
        <br>
        <div class="panel panel-primary">   
            <div class="panel-heading">Evaluer le match (optionnel)</div>
            <div class="panel-body"> 
                <div class="col-sm-12">
                    {!! Form::open(['route' => 'compterenduannexe.store', 'class' => 'form-horizontal panel']) !!}   
                    
                    <div class="form3">
                        <i>Les champs munis d'une (*) sont obligatoires pour les joueurs certifiés.</i>
                            </br></br></br>
                            <div class="form-group {!! $errors->has('club_évalué') ? 'has-error' : '' !!}">
                             Club évalué *
                                <select name="club_évalué" id="club_évalué" class="form-control">
                                    <option label="">{!! $compterendu->nomclub1 !!}</option>
                                    <option label="">{!! $compterendu->nomclub2 !!}</option>
                                </select>
                            </div>
                            <div class="form-group {!! $errors->has('eval_physique') ? 'has-error' : '' !!}">
                                Performance physique *
                                {!! Form::textarea('eval_physique', null, ['class' => 'form-control', 'placeholder' => "Note et évaluation de la performance physique de l'adversaire"]) !!}
                                {!! $errors->first('eval_physique', '<small class="help-block">:message</small>') !!}
                            </div>
                            <div class="form-group {!! $errors->has('eval_technique') ? 'has-error' : '' !!}">
                                Performance technique *
                                {!! Form::textarea('eval_technique', null, ['class' => 'form-control', 'placeholder' => "Note et évaluation de la performance technique de l'adversaire"]) !!}
                                {!! $errors->first('eval_technique', '<small class="help-block">:message</small>') !!}
                            </div>
                            <div class="form-group {!! $errors->has('eval_fairplay') ? 'has-error' : '' !!}">
                                Fair-play *
                                {!! Form::textarea('eval_fairplay', null, ['class' => 'form-control', 'placeholder' => "Note et évaluation du niveau de fair-play de l'adversaire"]) !!}
                                {!! $errors->first('eval_fairplay', '<small class="help-block">:message</small>') !!}
                            </div>
                            <div class="form-group">
                                Note globale (/5) *
                                <select name="note" id="note" class="form-control">
                                    @for($note=0;$note < 6;$note++)
                                        <option>{!! $note !!}</option>
                                    @endfor
                                </select>
                            </div>
                        </br>
                        <div class="form-group {!! $errors->has('renseignement') ? 'has-error' : '' !!}">
                            Renseignements complémentaires
                            {!! Form::textarea('renseignement', null, ['class' => 'form-control', 'placeholder' => 'Sanctions, blessés, prix en jeu, etc.']) !!}
                            {!! $errors->first('renseignement', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="form-group">
                             <input class="form-control" id="user" name="user" type="hidden" value="{{ $user->id }}">                   
                        </div>
                    </div>      
                        {!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
                        {!! Form::close() !!}
                    </div>
            </div>
        </div>

        <!--<a href="javascript:history.back()" class="btn btn-primary">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>-->
     </div>
@endsection