
@extends('interfaces.template')
@extends('layouts.app')

@section('contenu')
    @include('interfaces.header')

    <div class="col-sm-offset-4 col-sm-4">
    	<br>
		<div class="panel panel-primary">	
			<div class="panel-heading">[{{ $compterendu->id_catégoriesports }}] : {{ $compterendu->nomrencontre}} </div>
			<div class="panel-body"> 
				<table class="table">
						<tr>
							<th>Lieu </th>
							<th>{{ $compterendu->lieu }} </th>
						</tr>
						<tr>
							<th >Date </th>
							<th>{{ $compterendu->datematch }}</th>
						</tr>
				</table>
			</br>
				<table class="table">
						<tr>
							<th>Type de match </th>
							<th>{{ $compterendu->typerencontre}}</th>
						</tr>
						<tr>
							<th>Niveau </th>
							<th>{{ $compterendu->niveau }}</th>
						</tr>
				</table>
			</br>
				<table class="table">
										
						<tr> 
							<th>Club évalué</th>
							<th>{{ $compterendu->club_évalué}} </th>
						</tr>
						<tr>
							<th>Performance physique</th>
							<th>{{ $compterendu->eval_physique }}</th>
						</tr>
						<tr>
							<th>Performance technique</th>
							<th>{{ $compterendu->eval_technique }} </th>
						</tr>
						<tr>
							<th>Fair-play</th>
							<th>{{ $compterendu->eval_fairplay }}</th>
						</tr>
						<tr>
							<th>Note</th>
							<th>{{ $compterendu->note }} </th>
						</tr>				
				</table>
			</br>
				<table class="table">
					<tr><th>Renseignements complémentaires</th></tr>
					<tr><th>{{ $compterendu->renseignements }}</th></tr>				
				</table>
			</br>
			</br>
				@foreach ($users as $user)
                    @if($user->id == $compterendu->id_users)                           
                        <i> Compte rendu rédigé par {!! $user->name !!}</i>
                    @endif
                @endforeach
				
			</div>
		</div>				
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>
@endsection

