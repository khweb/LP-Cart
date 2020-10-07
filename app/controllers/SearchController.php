<?php


namespace app\controllers;
use lpcart\App;
use RedBeanPHP\R;

class SearchController extends AppController{

    public function typeaheadAction(){
        if($this->isAjax()){
						$query = !empty(trim($_GET['query'])) ? trim($_GET['query']) : null;
            if($query){
                $products = R::getAll('SELECT id, title FROM product WHERE title LIKE ? LIMIT 10', ["%{$query}%"]);
                echo json_encode($products);
            }
        }
        die;
		}
		
		public function indexAction(){
			$query = !empty(trim($_GET['s'])) ? trim($_GET['s']) : null;
			if($query){
				$products = R::find('product', 'title like ?', ["%{$query}%"]);
			}

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

			$this->set(compact('products',h('query')));
			$this->setMeta('Поиск по:' . h($query));
		}

}
