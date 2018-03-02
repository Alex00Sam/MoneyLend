<?php
  require 'vendor/autoload.php';
  $app = new \atk4\ui\App('Test');
  $app->initLayout('Centered');

  $button = $app->add(['Button','Click']);

  $seg = $app->add(['ui'=>'segment']);

  $label = $seg->add(['Label','Old name']);
  if(isset($_GET['name'])) {
    $label->set($_GET['name']);
  }

  $button ->on('click',function () use($seg) {
    $name = 'New name';
    return $seg->jsReload(['name'=>$name]);
  });
