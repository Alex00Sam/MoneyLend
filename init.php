<?php

require 'vendor/autoload.php';

//New app//
$app = new \atk4\ui\App('Travelappp');
///////////

//Layout//
$layout = $app->initLayout('Centered');
//////////

//DB Connection//
//$db = new \atk4\data\Persistence::connect('mysql://MyUser:12345@localhost/money');

$db = new
\atk4\data\Persistence_SQL('mysql:dbname=money;host=localhost', 'MySite', '12345');
