@extends('template_form')

@section('title')
    Ajout d'un article
@stop

@section('form')
	{{ Form::open(array('url' => 'post/add')) }}
		{{ Form::control('text', $errors, 'titre', 'Titre') }}
		{{ Form::control('textarea', $errors, 'contenu', 'Contenu') }}
		{{ Form::control('text', $errors, 'tags', 'Entrez les tags séparés par des virgules') }}
		{{ Form::button_submit('Envoyer !') }}
	{{ Form::close() }}
@stop