@extends('layouts.app')

@section('content')
    @include('interfaces.header')	
    <div class="col-sm-offset-4 col-sm-4">
    	<br>
		<div class="panel panel-primary">	
			<div class="panel-heading">Modifier</div>
			<div class="panel-body"> 
				<div class="col-sm-12">
					{!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
					<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
					  	{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
					  	{!! $errors->first('name', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
					  	{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
					  	{!! $errors->first('email', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
					  	{!! Form::password('password', null, ['class' => 'form-control', 'placeholder' => 'Mot de passe']) !!}
					  	{!! $errors->first('password', '<small class="help-block">:message</small>') !!}
					</div>
					
					@if (Auth::User()->Droitsadmin == 1)				
						<div class='form-group'>
							<div class='checkbox'>
								<label>
									{!! Form::checkbox('Droitsadmin', 1, null) !!}Administrateur
								</label>
							</div>
						</div>
						<div class="form-group">
							<div class="checkbox">
								<label>
									{!! Form::checkbox('certified', 1, null) !!} Utilisateur certifié
								</label>
							</div>
						</div>
						<div class="form-group">
							{!! Form::text('specification', null, ['class' => 'form-control', 'placeholder' => 'Spécification (de quel club/équipe vous venez?)']) !!}
						</div>
					@endif
					
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