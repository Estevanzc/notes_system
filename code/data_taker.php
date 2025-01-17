<?php

require_once("Connection_cfg.php");
require_once("vendor/autoload.php");

$controller = ($_GET["request_type"] == 0 ? new Controller\UserController([false, true][(int)$_GET["require_login"]]) : new Controller\NoteController(true));
$data = ($_GET["request_type"] == 0 ? $controller->userList() : $controller->filter_list());

print_r(json_encode($data));