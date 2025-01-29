<?php

require_once("Connection_cfg.php");
require_once("vendor/autoload.php");

$controller = new Controller\UserController();
echo("<pre>");
print_r($_POST);
die;
$controller->save();
