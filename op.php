<?php
	require 'init.php';
	
	if (isset($GET["id"])){
	
	
	$grid= $app->layout->add('CRUD');
	$grid->setModel(new money($db));
	}
	else {
		return $app->error('No info was found');
	}