
<?php

use lpcart\App;
use lpcart\Router;

require_once dirname(__DIR__) . '/config/init.php';
require_once LIBS . '/function.php';
require_once CONF . '/routes.php';


new App;

//debug(Router::getRoutes());
//throw new Exception('Исключене', 404);

?>