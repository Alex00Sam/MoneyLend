<?php
	require 'init.php';
	
	if (isset($GET["id"])){
	$grid= $app->layout->add('CRUD');
	$grid->setModel(new money($db));
	}
	else {
		$error=$app->layout->add('No info was found');
		$grid= $app->layout->add('CRUD');
		$grid->setModel(new money($db));	
	}