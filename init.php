<?php
require 'vendor/autoload.php';

//New app//
$app=new \atk4\ui\App('Money Lending App');
///////////

//Layout//
$layout = $app->initLayout('Admin');
//////////

//DB Connection//
$db = new 
\atk4\data\Persistence_SQL('mysql:dbname=money;host=127.0.0.1','MySite','12345');
