<?php

namespace app\controllers;

use lpcart\App;
use lpcart\Cache;
use \RedBeanPHP\R;

class MainController extends AppController{

	public function indexAction() {
		//бренды
		$brands = R::findAll('brand', 'LIMIT 3');		

		//хиты
		$hits = R::find('product', "hit = '1' AND status = '1' LIMIT 8");
		$currency = App::$app->getProperty('currency');

		//смена цены
		foreach ($hits as $product) {
			if($currency['base'] != 1) {
				$product->price = $currency['symbol_left'] . $product->price * $currency['value'] . ' ' . $currency['symbol_right'];
				$product->old_price = $product->old_price * $currency['value'];
			} else {
				$product->price = $currency['symbol_left'] . $product->price . ' ' . $currency['symbol_right'];
				$product->old_price = $product->old_price;
			}
		}

		//имя сайта из контейнера
		$sitename = App::$app->getProperty('shop_name');

		//установливаю мета страници
		$this->setMeta( 'Главная - ' . $sitename , 'Главная страница фреймворка', 'фреймворк,магазин');

		//кэш
		//$cache = Cache::instance();

		//передаю переменные в вид
		$this->set(compact('brands', 'hits'));
	}

}