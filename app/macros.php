<?php

Form::macro('control', function($type, $errors, $nom, $placeholder)
{
    $valeur = Request::old($nom) ? Request::old($nom) : null;
	$attributes = array('class' => 'form-control', 'placeholder' => $placeholder);
	return sprintf('
		<small class="text-danger">%s</small>
		<div class="form-group %s">
			%s
		</div>',
		$errors->first($nom),
		$errors->has($nom) ? 'has-error' : '',
		call_user_func_array(array('Form', $type), array($nom, $valeur, $attributes))
	);
});

Form::macro('button_submit', function($texte)
{
	return Form::submit($texte, array('class' => 'btn btn-info pull-right'));
});

HTML::macro('button_back', function()
{
	return '<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>';
});