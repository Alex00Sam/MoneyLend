<?php
	require 'init.php';
	$back=$app->layout->add('Button');
	$back->set('Back');
	$back->link('index.php');
	$friend = new Friends($db);
	$friend->load($app->stickyGet('friends_id'));
	$loans = $friend->ref('Money');
	$columns = $app->layout->add(['ui'=>'segment'])->add(new \atk4\ui\Columns('divided'));
	$column = $columns->addColumn();
	$ispaid = ['positive'=>['new return'],'negative'=>['new lend']];
	$crud = $column->add('CRUD');
	$crud->addColumn('type', new \atk4\ui\TableColumn\Status($ispaid));
  $crud->setModel(new Money($db),['amount','date']);

	$reminder = $columns->addColumn()->add(new ReminderBox())->setModel($friend);
