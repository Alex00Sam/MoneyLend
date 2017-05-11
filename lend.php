<?php
	require 'init.php';
	//Form//
	$form = $app->layout->add('Form');
	$form->setModel(new friends($db));

	$form->onSubmit(function($form) {
		$form->model->save();
		return $form->success('Record updated');
			
	});
	$grid= $app->layout->add('CRUD');
	$grid->setModel(new Friends($db));
	$grid->addAction('Update details',new \atk4\ui\jsExpression('document.location="op.php;'));
?>

