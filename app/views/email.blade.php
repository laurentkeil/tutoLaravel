@extends('template')


@section('title')
	Email
@stop

@section('content')
    <br>
	<div class="col-sm-offset-4 col-sm-4">
		<div class="panel panel-info">
			<div class="panel-heading">Inscription à la lettre d'information</div>
			<div class="panel-body"> 
				{{ Form::open(array('url' => 'email/form')) }}
					<small class="text-danger">{{ $errors->first('email') }}</small>
					<div class="form-group {{ $errors->has('email') ? 'has-error has-feedback' : '' }}">
						{{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Entrez votre email')) }}
					</div>
					{{ Form::submit('Envoyer !', array('class' => 'btn btn-info pull-right')) }}
				{{ Form::close() }}
			</div>
		</div>
	</div>
@stop