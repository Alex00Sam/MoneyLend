<?php
	require 'init.php';
	//Form//
	$form = $app->layout->add('Form');
	$form->setModel(new Friends($db));

	$form->onSubmit(function($form) {
		$form->model->save();
		return $form->success('Record updated');

	});
	$layout->add(['ui'=>'hidden divider']);
	$crud = $app->layout->add('CRUD');

	$crud->addColumn('name', new \atk4\ui\TableColumn\Link('loan.php?friends_id={$id}'));
	$crud->setModel(new Friends($db));
	//$crud->setModel(ref('Friends'), ['email','phone']);
//	$crud->setModel(new Friends($db));
//	$crud->addAction('Update details',new \atk4\ui\jsExpression('document.location="op.php"'));
