<?php
	require 'init.php';
	
	if (isset($GET["friends_id"])){
	
	
	$grid= $app->layout->add('CRUD');
	$grid->setModel(new loan($db));
	}
	else {
		return $app->error('No info was found');
	}