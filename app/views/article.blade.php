@extends('template')

@section('title')
    Les articles
@stop

@section('content')
	<p>C'est l'article n° {{{ $numero }}}</p>
@stop