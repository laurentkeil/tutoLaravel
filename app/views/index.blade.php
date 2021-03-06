@extends('template')

@section('title')
	Page index users
@stop

@section('content')
    <br>
	<div class="col-sm-offset-4 col-sm-4">
		@if(Session::has('ok'))
			<div class="alert alert-success">{{ Session::get('ok') }}</div>
		@endif
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Liste des utilisateurs</h3>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Nom</th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				  @foreach ($users as $user)
				    <td>{{ $user->id }}</td>
				    <td class="text-primary"><strong>{{ $user->name }}</strong></td>
				    <td>{{ link_to_route('user.show', 'Voir', array($user->id), array('class' => 'btn btn-success btn-block')) }}</td>
				    <td>{{ link_to_route('user.edit', 'Modifier', array($user->id), array('class' => 'btn btn-warning btn-block')) }}</td>
				    <td>
							{{ Form::open(array('method' => 'DELETE', 'route' => array('user.destroy', $user->id))) }}
								{{ Form::submit('Supprimer', array('class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cet utilisateur ?\')')) }}
							{{ Form::close() }}
				    </td>
				    </tr>
				  @endforeach
	  		</tbody>
			</table>
		</div>
		{{ link_to_route('user.create', 'Ajouter un utilisateur', null, array('class' => 'btn btn-info pull-right')) }}
		{{ $users->links(); }}
	</div>
@stop