<?php

namespace lpcart;

use \RedBeanPHP\R;

class Db {

	use TSingletone;

	protected function __construct(){

		//get db config
		$db = require_once CONF . '/config_db.php';

		//db connect
		R::setup($db['dsn'],$db['user'],$db['pass']);

		if (!R::testConnection()){
			throw new \Exception('Нет соединения с БД', 500);
		}

		R::freeze(true);
		if(DEBUG){
			R::debug(true,1);
		}

	}


}