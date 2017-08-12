<?php
	require 'init.php';
	$back=$app->layout->add('Button'); 		//
	$back->set('Back');										// Back button
	$back->link('index.php');							//
	$friend = new Friends($db);
	$friend->load($app->stickyGet('friends_id'));  // making a relation
	$borrowed = $friend->ref('Borrowed');	// relation for borrowed
	$returned = $friend->ref('Returned');	// relation for returned

	$layout->add('Header')->set($friend['name']);  // adding name
	$columns = $app->layout->add(['ui'=>'segment'])->add(new \atk4\ui\Columns('divided')); //adding column style

	$column = $columns->addColumn(); // adding column
	$column->add('Header')->set('In that interface you can add new lends:'); //adding header
	$crud1 = $column->add('CRUD');
  $crud1->setModel($borrowed,['amount','date']);  //making crud for borrowed

	$column->add(['ui'=>'hidden divider']);

	$column->add('Header')->set('In that interface you can add new returnings:');
	$crud2 = $column->add('CRUD');
	$crud2->setModel($returned,['amount','date']); //making crud for borrowed

	$column2 =  $columns->addColumn();  //adding second column
	$column2->add('Header')->set('Here you have reminder message for your friend. If you will, you can send it to him.');

	$column2->add(new ReminderBox())->setModel($friend); //adding reminder message
