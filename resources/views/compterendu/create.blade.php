@extends('interfaces.template')
@extends('layouts.app')

@section('contenu')
    @include('interfaces.header')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript">

        var n=2;
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

        function deleteNew() {
            $('#mydiv').delegate('.delete', 'click', function () {
            $(this).parent().parent().remove();
            });
            n--;
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



