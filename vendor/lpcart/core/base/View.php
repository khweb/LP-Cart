<?php 

namespace lpcart\base;

class View {

	public $route;
	public $home_url;
	public $controller;
	public $view;
	public $model;
	public $prefix;
	public $layout;
	public $data = [];
	public $meta = ['title' => '', 'desc' => '', 'keywords' => ''];

	public function __construct($route, $layout = '', $view = '', $meta ){
		$this->route = $route;
		$this->controller = $route['controller'];
		$this->view = $view;
		$this->model = $route['controller'];
		$this->prefix = $route['prefix'];
		$this->meta = $meta;
		$this->home_url = HOME_PAGE_URL;

		if($layout === false) {
			$this->layout = false;
		}else{
			$this->layout = $layout ?: LEYOUT;
		}
	}

	public function render($data) {
		if(is_array($data)) extract($data);
		$viewFile = APP . "/views/{$this->prefix}{$this->controller}/{$this->view}.php";

		$meta = $this->getMeta();
		$home_url = $this->home_url;
		
		if (is_file($viewFile)) {
			ob_start();
			require_once $viewFile;
			$content = ob_get_clean();
		} else {
			throw new \Exception("Не найден вид {$viewFile}" , 500);
		}

		if (false != $this->layout) {
			$layoutFile = APP . "/views/layouts/{$this->layout}.php";
			if (is_file($layoutFile)) {
				require_once $layoutFile;
			}else{
				throw new \Exception("Шаблон {$this->layout} не найден" , 500);
			}
		}
	}

	public function getMeta() {
		$output = '<title>' . $this->meta['title'] . '</title>' . PHP_EOL;
		$output .= '<meta name="description" content="'. $this->meta['desc'] . '">' . PHP_EOL;
		$output .= '<meta name="keywords" content="' . $this->meta['keywords'] . '">' . PHP_EOL;
		return 	$output;
	}

}