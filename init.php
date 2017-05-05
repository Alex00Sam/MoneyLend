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
\atk4\data\Persistence_SQL('mysql:dbname=money;host=eu-cdbr-west-01.cleardb.com','b43963c1dcd91f','8ed0930d');
