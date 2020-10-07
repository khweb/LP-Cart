<?php

namespace app\controllers;

use lpcart\App;
use lpcart\Cache;
use RedBeanPHP\R;
use app\models\AppModel;
use lpcart\base\Controller;
use app\widgets\currency\Currency;

class AppController extends Controller{

	public function __construct($route){
		parent::__construct($route);
		new AppModel();
		App::$app->setProperty('currencies' , Currency::getCurrencies());
		App::$app->setProperty('currency' , Currency::getCurrency( App::$app->getProperty('currencies')) );
		App::$app->setProperty('cats' , self::cacheCategory());		
		//debug(App::$app->getProperties());
	}

	public static function cacheCategory() {
		$cache = Cache::instance();
		$cats = $cache->get('cats');
		if (!$cats) {
			$cats = R::getAssoc("SELECT * FROM category");
			$cache->set('cats', $cats);
		}
		return $cats;
	}

}
