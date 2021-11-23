<?php
session_start();
define('PATH_ROOT', __DIR__ . '/');
define('PATH_CONFIG', PATH_ROOT . 'configs' . '/');

require_once(PATH_CONFIG . 'index.php');
require_once(PATH_VENDOR . 'index.php');
require_once(PATH_CONTROLLER . 'index.php');

//Run Application
app()->Start();
