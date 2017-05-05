
<?php
require 'init.php';
	$form = $app->layout->add('Form');
	$form->setModel(new friends($db));
	$form->onSubmit(function($form) {
		$form->model->save();
		return new \atk4\ui\jsExpression('document.location="op.php?friends_id="+$(this).closest("tr").data("id");');		
	});




