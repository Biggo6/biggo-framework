<?php

include_once getcwd() . DIRECTORY_SEPARATOR . "..".  DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "settings.php";



define('DEFAULT_CONTROLLER', $app['default_controller']);
define('DB_HOST', $app['database_host']);
define('DB_USER', $app['database_username']);
define('DB_PASS', $app['database_password']);
define('DB_NAME', $app['database_name']);
define('DEBUG_STATUS', $app['debug']);
define('ROOT_PATH', $app['root_path']);
define('DS', DIRECTORY_SEPARATOR);
define('ASSET_PATH_IMG', $app['real_path'] . "public/assets/biggo.jpg");
define('SYS_INIT', ROOT_PATH . DS ."..".DS . "engine" . DS . "boot" .  DS . "helper" . DS . "InitApp.php");