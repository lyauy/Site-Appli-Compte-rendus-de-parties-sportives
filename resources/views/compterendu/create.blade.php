@extends('interfaces.template')
@extends('layouts.app')

@section('contenu')
    @include('interfaces.header')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript">

        var n=1;
        var mnl=2;
        var mfn=2;
        var max=25;

        function createNew() {

            if(n<max)
                {
                    $("#mydiv").append(
                        +'<tbody>'
                        +'<tr>'
                        +'@for($i=1;$i < 3;$i++)'
                        +'<th>'
                            +'<table>'
                                +'<thead>'
                                    +'<tr>Joueur '+ n +'</tr>'
                                +'</thead>'
                                +'<tbody>'
                                    +'<tr class="form-group">'+'<input type="text" name="nolicence[]" class="form-control" placeholder="Numéro de licence"/>'
                                    +'</tr>'
                                    +'<tr class="form-group">'+'<input type="text" name="fullname[]" class="form-control" placeholder="Nom et prénom"/>'
                                    +'</tr>'
                                +'</tbody>'
                            +'</table>'
                        +'</th>'
                        +'@endfor'
                        +'</tr>'
                        +'</tbody>'
                        );
                    n++;
                }
            
        }

        
    </script>

    <div class="col-sm-offset-4 col-sm-4">
        <br>
        <div class="panel panel-primary">   
            <div class="panel-heading">Nouveau compte-rendu</div>
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
                <div class="form2">
                    <div class="form-group">
                        <table id="mydiv">                            
                            <thead>
                                <tr>
                                    <th>Joueurs équipe 1</th>
                                    <th>Joueurs équipe 2 (adverse)</th>
                                </tr>                        
                            </thead> 
                        </br>                           
                            <tbody>                                                                                 
                                <tr>
                                @for($k = 1;$k < 3;$k++)                                        
                                    <th>                                            
                                        <table>
                                            <thead>
                                                <tr>Joueur 1</tr>
                                            </thead>
                                            <tbody>
                                                <tr class="form-group"><input type="text" name="nolicence[]" class="form-control" placeholder="Numéro de licence"/></tr>
                                                <tr class="form-group"><input type="text" name="fullname[]" class="form-control" placeholder="Nom et prénom"/></tr>
                                            </tbody>
                                        </table>                                        
                                    </th>                                         
                                @endfor                                                     
                                </tr>                                    
                            </tbody>                                                      
                        </table>                   
                        <input type="button" class="btn btn-lg btn-primary add" value="+" onclick="createNew()">                     
                    </div>
                </div>
            </br></br>
                <div class="form3">
                    <i>Les champs munis d'une (*) sont obligatoires pour les joueurs certifiés.</i>
                        </br></br></br>
                        <div class="form-group {!! $errors->has('club_évalué') ? 'has-error' : '' !!}">
                            Club évalué *
                            {!! Form::text('club_évalué', null, ['class' => 'form-control', 'placeholder' => 'Nom du club évalué']) !!}
                            {!! $errors->first('club_évalué', '<small class="help-block">:message</small>') !!}
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

        <a href="javascript:history.back()" class="btn btn-primary">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>
     </div>
@endsection



