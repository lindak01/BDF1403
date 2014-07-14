<?php

require_once "db/db.php";
require_once "models/model.php";
require_once "models/views.php";

$view = new views();

$view->show('header');
$view->show('body');
$view->show('footer');

?>