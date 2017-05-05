<?php
	require 'init.php';
	
	if (isset($GET["friends_id"])){
	
	
	$grid= $app->layout->add('CRUD');
	$grid->setModel(new Money($db));
	}
	else {
		echo "No info was found";
		$grid= $app->layout->add('CRUD');
		$grid->setModel(new Money($db));
		$grid->addAction('Update details',new \atk4\ui\jsExpression('document.location="op.php?friends_id="+$(this).closest("tr").data("id");'));
	}