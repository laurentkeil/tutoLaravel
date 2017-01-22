@extends('template')

@section('content')
    <br>
	<div class="col-sm-offset-3 col-sm-6">
		<div class="panel panel-info">
			<div class="panel-heading">
				@yield('title')
			</div>
			<div class="panel-body"> 
				@yield('form')
			</div>
		</div>
		{{ HTML::button_back() }}
	</div>
@stop