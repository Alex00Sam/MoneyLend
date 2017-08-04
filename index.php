<?php
require 'init.php';
//Form//
$intro = $app->layout->add('Header')->set('Welcome to Money Lending App, where you can manage your friend loans and their returnings. Enjoy!');
$form = $app->layout->add('Form');
$form->setModel(new Friends($db));

$form->onSubmit(function($form) {
  $form->model->save();
  return $form->success('You have successfully added a new friend!');

});
$layout->add(['ui'=>'hidden divider']);
$crud = $app->layout->add('CRUD');

$crud->addColumn('name', new \atk4\ui\TableColumn\Link('loan.php?friends_id={$id}'));
$crud->setModel(new Friends($db));
