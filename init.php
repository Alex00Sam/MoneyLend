<?php

require 'vendor/autoload.php';

//New app//
$app = new \atk4\ui\App('Travelappp');
///////////

//Layout//
$layout = $app->initLayout('Centered');
//////////

//DB Connection//
$db = new
\atk4\data\Persistence_SQL('mysql:dbname=heroku_280a158781dc374;host=eu-cdbr-west-01.cleardb.com', 'b43963c1dcd91f', '8ed0930d');
