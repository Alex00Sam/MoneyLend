<?php
	require 'init.php';
	$back=$app->layout->add('Button');
	$back->set('Back');
	$back->link('index.php');
	$friend = new Friends($db);
	$friend->load($app->stickyGet('friends_id'));
	$loans = $friend->ref('Money');
	$columns = $app->layout->add(['ui'=>'segment'])->add(new \atk4\ui\Columns('divided'));
	$crud = $columns->addColumn();
	//$ispaid = ['positive'=>['new return'],'negative'=>['new return']];
	$crud->add('CRUD')->setModel(new Money($db));
	//->addColumn('status', new \atk4\ui\TableColumn\Status($ispaid));
	$reminder = $columns->addColumn()->add(new ReminderBox())->setModel($loans);
