<?php

namespace app\controllers;

use Exception;
use lpcart\App;
use RedBeanPHP\R;
use app\models\product;
use app\models\breadcrumbs;

class ProductController extends AppController {

	public function viewAction() {	
		
		$product = R::findOne('product' ," alias = ? AND status = '1' " , [$this->route['alias']]);
	
		if (!$product) {
			throw new Exception( 'Страница не найдена' , '404');
		}

		$currency = App::$app->getProperty('currency');

		if($currency['base'] != 1) {
			$product->price = $currency['symbol_left'] . $product->price * $currency['value'] . ' ' . $currency['symbol_right'];
			$product->old_price = $product->old_price * $currency['value'];
		} else {
			$product->price = $currency['symbol_left'] . $product->price . ' ' . $currency['symbol_right'];
			$product->old_price = $product->old_price;
		}

		$categories = App::$app->getProperty('cats');

		$category = array(
			'id' => $product->category_id,
			'alias' => $categories[$product->category_id]['alias'],
			'title' => $categories[$product->category_id]['title'],
		);

		// установливаю мета страници
		$sitename = App::$app->getProperty('shop_name');
		$this->setMeta( $sitename . ' - ' .  $product->title , $product->description , '');

		// todo:

		// хлебные крошки
		$breadcrumbs = Breadcrumbs::getBreadcrumbs($product->category_id, $product->title);

		// связанные товары
		$related = R::getAll("SELECT * FROM related_product JOIN product ON product.id =  related_product.related_id WHERE related_product.product_id = ?", [$product->id]);

		// конвертируем валюту
		foreach ($related as $related_product):
			if($currency['base'] != 1) {
				$related_product['price'] = $currency['symbol_left'] . $related_product['price'] * $currency['value'] . ' ' . $currency['symbol_right'];
				$related_product['old_price'] = $related_product['old_price'] * $currency['value'];
			} else {
				$related_product['price'] = $currency['symbol_left'] . $related_product['price'] . ' ' . $currency['symbol_right'];
				$related_product['old_price'] = $related_product['old_price'];
			}
		endforeach;
	
		// запись в куки текущего товара
		$p_model = new Product();
		$p_model->setRecentlyViewed($product->id);		

		// просмотренные товары
		$r_viewed = $p_model->getRecentlyViewed();
		$resentlyViewed = null;

		if ($r_viewed) {
			$resentlyViewed = R::find("product" , ' id IN (' . R::genSlots($r_viewed) . ') LIMIT 3' , $r_viewed );
		}	

		// просмотренные товары валюта
		foreach ($resentlyViewed as $rv_product) {
			if($currency['base'] != 1) {
				$rv_product->price = $currency['symbol_left'] . $rv_product->price * $currency['value'] . ' ' . $currency['symbol_right'];
				$rv_product->old_price = $rv_product->old_price * $currency['value'];
			} else {
				$rv_product->price = $currency['symbol_left'] . $rv_product->price . ' ' . $currency['symbol_right'];
				$rv_product->old_price = $rv_product->old_price;
			}
		};

		// галлерея
		$gallery = R::findAll("gallery" , "product_id = ?" , [$product->id]);
	
		// модификации
		$mods = R::findAll("modification" , "product_id = ?" , [$product->id]);

		//debug($mods);

		// передаю переменные в вид
		$this->set(compact('product', 'category', 'related', 'gallery','resentlyViewed', 'breadcrumbs', 'mods', 'currency'));
	}

}
