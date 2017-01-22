@extends('template')

@section('title')
 Erreurs
@stop

@section('content')
    <br>
	<div class="col-sm-offset-4 col-sm-4">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<h3 class="panel-title">Il y a un problème !</h3>
			</div>
			<div class="panel-body"> 
				<p>Il y a un problème d'accès à la base de données, nous sommes désolés, veuillez essayer plus tard.</p>
			</div>
		</div>
	</div>
@stop