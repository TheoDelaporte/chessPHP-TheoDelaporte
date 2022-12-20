<?php
$className = 'rook';

spl_autoload_register(function($autoloader){

    $autoloader = str_replace("App", "classes", $autoloader);
    $autoloader = str_replace("\\", "/", $autoloader);
    $autoloader .= '.php';

    require_once $autoloader;
});

$piece = new $className('D5');
$position = $piece->position;
$xy = @$piece->getPossiblePlay($position);
$piece->show($position, $xy);