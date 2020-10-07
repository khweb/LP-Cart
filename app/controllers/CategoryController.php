<?php

namespace app\controllers;
use lpcart\App;
use RedBeanPHP\R;
use app\models\Category;
use app\models\Breadcrumbs;
use lpcart\libs\Pagination;

class CategoryController extends AppController{

	public function viewAction(){
		$alias = $this->route['alias'];
		$category = R::findOne('category', 'alias = ?' , [$alias]);
		//debug($category);
		if(!$category) {
			throw new \Exception('Страница не найдена', 404);
		}

		//хлебные крошки
		$breadcrumbs = Breadcrumbs::getBreadcrumbs($category->id);

		$cat_model = new Category;
		$ids = $cat_model->getIds($category->id);
		$ids = !$ids ? $category->id : $ids . $category->id;

		$page = isset($_GET['page']) ? (int)$_GET['page'] : 1 ;
		$perpage = App::$app->getProperty('pagination');
		$total = R::count("product" , "category_id IN ( $ids )");
		$pagination = new Pagination($page, $perpage, $total);
		$start = $pagination->getStart();

		$products = R::find("product" , "category_id IN ( $ids ) LIMIT $start , $perpage");
		$currency = App::$app->getProperty('currency');

		//смена цены
		foreach ($products as $product) {
			if($currency['base'] != 1) {
				$product->price = $currency['symbol_left'] . $product->price * $currency['value'] . ' ' . $currency['symbol_right'];
				$product->old_price = $product->old_price * $currency['value'];
			} else {
				$product->price = $currency['symbol_left'] . $product->price . ' ' . $currency['symbol_right'];
				$product->old_price = $product->old_price;
			}
		}

		// установливаю мета страници
		$sitename = App::$app->getProperty('shop_name');
		$this->setMeta( $sitename . ' - ' .  $category->title , $category->description , $category->keywords);

		$this->set(compact('products', 'category', 'breadcrumbs' , 'pagination' , 'total'));
		
		
	}

}
