@extends('template')

@section('title')
	formulaire d'infos
@stop

@section('content')
    {{ Form::open(array('url' => 'users')) }}
        {{ Form::label('nom', 'Entrez votre nom : ') }}
        {{ Form::text('nom') }}
        {{ Form::submit('Envoyer !') }}
	{{ Form::close() }}
@stop