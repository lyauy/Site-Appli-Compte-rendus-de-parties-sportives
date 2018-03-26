
@extends('layouts.app')

@section('content')
    @include('interfaces.header')

    <div id="showcr">
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
								<th>{{ $compterendu->typerencontre }}</th>
							</tr>
							<tr>
								<th>Niveau </th>
								<th>{{ $compterendu->niveau }}</th>
							</tr>
					</table>
				</br>
					<table class="table">
							<tr>
								<th>Club en opposition</th>
							</tr>
							<tr>
								<th>{{ $compterendu->nomclub1 }}</th>	
								<th>{{ $compterendu->nomclub2 }}</th>
							</tr>
					</table>
				</br>
					<table class="table">
						@php($i=1)
							<tr>
								<th>Joueurs </th>
							</tr>		
							<tr>
							@php($limit=0)
							@foreach($joueurs as $joueur)
								@if($compterendu->id == $joueur->id_compterendus && $limit < 2)
									@php($limit++)
									<th>{{ $joueur->fullname }}</th>
								@endif
								@if($limit >= 2)
									@php($limit = 0)
									<tr>
								@endif
							@endforeach	
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
				<comments model="Compterendu" :id="{{ $compterendu->id }}" csrf="{{ csrf_token() }}" ip="{{ md5(\Request::ip()) }}"></comments>
		</div>
	</div>
	<script src="{{ asset('js/manifest.6d644269af0752afce69.js') }}"></script>
    <script src="{{ asset('js/vendor.5a43481e0b9abccdaa99.js') }}"></script>
    <script src="{{ asset('js/app.d582fd47da8be7a98e61.js') }}"></script>


@endsection

