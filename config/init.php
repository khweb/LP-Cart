<?php

define('DEBUG', 1);
define('ROOT', dirname(__DIR__));
define('WWW', ROOT . '/public');
define('APP', ROOT . '/app');
define('CORE', ROOT . '/vendor/lpcart/core');
define('LIBS', ROOT . '/vendor/lpcart/core/libs');
define('CACHE', ROOT . '/tmp/cache');
define('CONF', ROOT . '/config');
define('LEYOUT', 'watches');
define('WIDGETS', APP . '/widgets' );
define('HOME_PAGE_URL', 'http://localhost:8888/lpcart');

//define app path
$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
$app_path = preg_replace("#[^/]+$#", '', $app_path);
$app_path = str_replace('/public/' , '', $app_path);

define ('PATH', $app_path);
define ('ADMIN', PATH . '/admin');

require_once ROOT . '/vendor/autoload.php';