<?php
	require 'init.php';
	
/*	if (isset($GET["amount"])){
	$grid= $app->layout->add('CRUD');
	$grid->setModel(new money($db));
	}
	else {
		echo "No info was found"; */
		$grid= $app->layout->add('CRUD');
		$grid->setModel(new money($db));	
//	}