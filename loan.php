<?php
	require 'init.php';
	$back=$app->layout->add('Button');
	$back->set('Back');
	$back->link('index.php');
	$friend = new Friends($db);
	$friend->load($app->stickyGet('friends_id'));
	$borrowed = $friend->ref('Borrowed');
	$returned = $friend->ref('Returned');

	$layout->add('Header')->set($friend['name']);
	$columns = $app->layout->add(['ui'=>'segment'])->add(new \atk4\ui\Columns('divided'));

	$column = $columns->addColumn();
	$column->add('Header')->set('In that interface you can add new lends:');
	$crud1 = $column->add('CRUD');
  $crud1->setModel($borrowed,['amount','date']);

	$column->add(['ui'=>'hidden divider']);

	$column->add('Header')->set('In that interface you can add new returnings:');
	$crud2 = $column->add('CRUD');
	$crud2->setModel($returned,['amount','date']);

	$column2 =  $columns->addColumn();
	$column2->add('Header')->set('Here you have reminder message for your friend. If you will, you can send it to him.');
	//$column2->add(['ui'=>'hidden divider']);
	$column2->add(new ReminderBox())->setModel($friend);
