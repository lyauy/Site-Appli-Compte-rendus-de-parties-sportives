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
            <div class="panel-heading">Ajouter les caractéristiques du match</div>
            <div class="panel-body"> 
                <div class="col-sm-12">
                    {!! Form::open(['route' => 'compterendu.store', 'class' => 'form-horizontal panel']) !!}   
                    <div class="form-group">
                        Sport
                        <select name="catégoriesport" id="catégoriesport" class="form-control">
                            @foreach($catégoriesports as $catégoriesport)
                                <option label="">{!! $catégoriesport->libellésport !!}</option>
                            @endforeach
                        </select>
                        <div class="form-group">
                             <input class="form-control" id="user" name="user" type="hidden" value="{{ $user->id }}">                   
                        </div>
                    </div>
                    <div class="form-group {!! $errors->has('nomrencontre') ? 'has-error' : '' !!}">
                        Rencontre
                        {!! Form::text('nomrencontre', null, ['class' => 'form-control', 'placeholder' => 'Equipe A contre Equipe B']) !!}
                        {!! $errors->first('nomrencontre', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('datematch') ? 'has-error' : '' !!}">
                        Date de la rencontre
                        {!! Form::date('datematch', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('datematch', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('lieu') ? 'has-error' : '' !!}">
                        Lieu de la rencontre
                        {!! Form::text('lieu', null, ['class' => 'form-control', 'placeholder' => 'Lieu et ville, région, pays']) !!}
                        {!! $errors->first('lieu', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group">
                        Type de la rencontre
                        <select name="typerencontre" id="typerencontre" class="form-control">
                            <option>Amical</option>
                            <option>Compétitif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        Niveau du match
                        <select name="niveau" id="niveau" class="form-control">
                            <option>International</option>
                            <option>National</option>
                            <option>Régional</option>
                            <option>Départemental</option>
                            <option>Local</option>
                        </select>
                    </div>
                    </br></br>
                    <div class="form-group">
                        <table>
                            <thead>
                                <tr>
                                    <th>Club équipe 1</th>
                                    <th>Club équipe 2 (adverse)</th>
                                </tr>                        
                            </thead>
                            <tbody>
                                <tr>  
                                    <th class = "{!! $errors->has('nomclub1') ? 'has-error' : '' !!}">                                        
                                        {!! Form::text('nomclub1', null, ['class' => 'form-control', 'placeholder' => 'Nom du club']) !!}
                                        {!! $errors->first('nomclub1', '<small class="help-block">:message</small>') !!}                                            
                                    </th>    
                                    <th class = "{!! $errors->has('nomclub2') ? 'has-error' : '' !!}">                                        
                                        {!! Form::text('nomclub2', null, ['class' => 'form-control', 'placeholder' => 'Nom du club']) !!}
                                        {!! $errors->first('nomclub2', '<small class="help-block">:message</small>') !!}                                            
                                    </th>                             
                                </tr> 
                            </tbody>
                        </table>
                    </div>
                </br>                    
                    {!! Form::submit('Suivant', ['class' => 'btn btn-primary pull-right']) !!}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>

        <!--<a href="javascript:history.back()" class="btn btn-primary">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>-->
     </div>
@endsection



