@extends('interfaces.template')
@extends('layouts.app')

@section('contenu')
    @include('interfaces.header')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript">

        var n=2;
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
                                    +'<tr class="form-group"><input type="text" name="nolicence[]" class="form-control" placeholder="Numéro de licence"/></tr>'
                                    +'<tr class="form-group"><input type="text" name="fullname[]" class="form-control" placeholder="Nom et prénom"/></tr>'
                                    +'<tr class="form-group"><input type="hidden" name="compterendu[]" class="form-control" value="{{ $compterendu->id }}"/></tr>'
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
    <h2 align="center">Nouveau compte-rendu</h2>
    <div class="col-sm-offset-4 col-sm-4">
        <br>
        <div class="panel panel-primary">   
            <div class="panel-heading">Ajouter les joueurs du match (optionnel)</div>
            <div class="panel-body"> 
                <div class="col-sm-12">
                    {!! Form::open(['route' => 'joueur.store', 'class' => 'form-horizontal panel']) !!}   
                        <div class="form-group">
                            <table id="mydiv">                            
                                <thead>
                                    <tr>
                                        <th>Joueurs équipe 1 : {{ $compterendu->nomclub1 }}</th>
                                        <th>Joueurs équipe 2 : {{ $compterendu->nomclub2 }}</th>
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
                                                    <tr class="form-group"><input type="hidden" name="compterendu[]" class="form-control" value="{{ $compterendu->id }}"/></tr>
                                                </tbody>
                                            </table>                                        
                                        </th>                                         
                                    @endfor                                                     
                                    </tr>                                    
                                </tbody>                                                      
                            </table>                   
                            <input type="button" class="btn btn-lg btn-primary add" value="+" onclick="createNew()">                     
                        </div>
                </br></br>
                    
                    {!! Form::submit('Suivant', ['class' => 'btn btn-primary pull-right']) !!}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>

        <a href="javascript:history.back()" class="btn btn-primary">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>
     </div>
@endsection