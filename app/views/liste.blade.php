@extends('template')

@section('title')
	Site
@stop

@section('nav')
    <ul class="nav navbar-nav {{ !Auth::check()? 'hidden' : '' }}">
		<li>{{ link_to('post/add', 'Créer un article') }}</li>
		<li>{{ link_to('#', 'Deconnexion', array('id' => 'logout')) }}</li>
	</ul>
	{{ Form::open(array('url' => 'auth/login', 'method' => 'post', 'class' => 'navbar-form navbar-right'.(Auth::check()? ' hidden' : ''))) }}
	  <div class="form-group">
	  	{{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Nom')) }}
	  </div>
	  <div class="form-group">
	  	{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Mot de passe')) }}
	  </div>		
	  {{ Form::submit('Connexion', array('class' => 'btn btn-default navbar-btn')) }}
		<div class="checkbox">
		  {{ Form::checkbox('souvenir') }} Se rappeler de moi
		</div>
	{{ Form::close() }}
@stop

@section('header')
	@if(Auth::check())
		<div class="btn-group pull-right">
			{{ link_to('post/add', 'Créer un article', array('class' => 'btn btn-info')) }}
			{{ link_to('auth/logout', 'Deconnexion', array('class' => 'btn btn-warning')) }}
		</div>
	@else
		{{ link_to('auth/login', 'Se connecter', array('class' => 'btn btn-info pull-right')) }}
	@endif
@stop

@section('content')
	@if(isset($info))
		<div class="row alert alert-info">{{{ $info }}}</div>
	@endif
	{{ $posts->links() }}
	@foreach($posts as $post)
		<article class="row bg-primary">
			<div class="col-md-12">
				<header>
					<h1>{{{ $post->titre }}}
						<div class="pull-right">
							@foreach($post->tags as $tag)
								{{ link_to('post/tag/' . $tag->tag_url, $tag->tag,	array('class' => 'btn btn-xs btn-info')) }}
							@endforeach
						</div>
					</h1>
				</header>
				<hr>
				<section>
					<p>{{{ $post->contenu }}}</p>
					{{ link_to('post/del/' . $post->id, 'Supprimer cet article', array('class' => 'btn btn-danger btn-xs'.(!(Auth::check() and Auth::user()->admin)? ' hidden' : ''))) }}<br>
					<em class="pull-right">
						<span class="glyphicon glyphicon-pencil"></span> {{{ $post->user->name }}} le {{ $post->created_at->format('d-m-Y') }}
					</em>
				</section>
			</div>
		</article>
		<br>
	@endforeach
	{{ $posts->links() }}
@stop	

@section('scripts')
	<script>
		$(function(){

			$('form').submit(function(e) {
				e.preventDefault();
				$.post('../auth/login',	$(this).serialize())
				.done(function( data ) {		
					if(data.ok) {
						$('ul.nav').removeClass('hidden');
						$('form').addClass('hidden');
						if(data.ok == 'admin') $('article section a').removeClass('hidden');
					} else {
						if(data.name) $("input[name='name']").parent().addClass('has-error');
						if(data.password) $("input[name='password']").parent().addClass('has-error');
					}
				});
			});

			$('#logout').click(function() {
				$.get('../auth/logout', function(data) {
					$('ul.nav').addClass('hidden');	
					$('form').removeClass('hidden');
					$('article section a').addClass('hidden');
				});		
			});

		});
	</script>
	<script type="text/javascript" src="../../../app/views/ajax/app.js"></script>

@stop