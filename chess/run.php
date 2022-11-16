<?php
$className = 'Bishop';

require_once $className . '.php';
require_once 'ChessBoard.php';

$piece = new $className('D5');
$position = $piece->position;
$xy = @$piece->getPossiblePlay($position);
$piece->show($position, $xy);