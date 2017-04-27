<?php
require 'vendor/autoload.php';

//New app//
$app=new \atk4\ui\app('My first app');
///////////

//Layout//
$app->initLayout('Centered');
//////////
$app->add('HelloWorld');

