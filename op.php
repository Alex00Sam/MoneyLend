<?php
	require 'init.php';
	
/*	if (isset($GET["amount"])){
	$grid= $app->layout->add('CRUD');
	$grid->setModel(new money($db));
	}
	else {
		echo "No info was found"; */
		$crud= $app->layout->add('CRUD');
			
		$crud->addColumn('name', new \atk4\ui\TableColumn\Link(['Money', 'friends_id'=>'{$id}']));
//		$crud->setModel($app->ref('money'), ['email']);
	$crud->setModel(new money($db));
//	}