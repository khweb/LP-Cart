<?php

namespace lpcart\base;

use lpcart\Db;
use Valitron\Validator;
use \RedBeanPHP\R;

abstract class Model {

	public $attributes = [];
	public $errors = [];
	public $rules = [];

	public function __construct()	{
		Db::instance();
	}

	public function load($data) {
		foreach ($this->attributes as $name => $value) {
			if (isset($data[$name])) {}
			$this->attributes[$name] = $data[$name];
		}
	}

	public function save($table) {
		$tbl = R::dispense($table);
		foreach ($this->attributes as $name => $value) {
			$tbl->$name = $value;
		}
		return R::store($tbl);
	}

	public function validate($data) {
		Validator::lang('ru');
		$v = new Validator($data);
		$v->rules($this->rules);
		if ($v->validate()) {
			return true;
		} else {
			$this->errors = $v->errors();
		}
	}

	public function getErrors() {
		$errors = '<ul>';
		foreach ($this->errors as $error) {
			foreach ($error as $item) {
				$errors.='<li>'.$item.'</li>';
			}
		}
		$errors .= '</ul>';
		$_SESSION['error'] = $errors;
	}

}