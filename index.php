<?php
require 'lend.php';
$grid= $app->layout->add('CRUD');
$grid->setModel(new Friends($db));