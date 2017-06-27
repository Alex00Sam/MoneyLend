<?php
	require 'init.php';
	//Form//
	$form = $app->layout->add('Form');
	$form->setModel(new friends($db));

	$form->onSubmit(function($form) {
		$form->model->save();
		return $form->success('Record updated');
			
	});
	$crud= $app->layout->add('CRUD');
	$crud->addColumn('name', new \atk4\ui\TableColumn\Link(['Money', 'friends_id'=>'{$id}']));
	$crud->setModel($app->friends->ref('Friends'), ['email']);
//	$crud->setModel(new Friends($db));
//	$crud->addAction('Update details',new \atk4\ui\jsExpression('document.location="op.php"'));
?>

