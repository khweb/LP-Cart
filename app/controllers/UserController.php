<?php

namespace app\controllers;

use app\models\User;

class UserController extends AppController {

	public function signupAction(){
		if(!empty($_POST)) {
			$user = new User();
			$data = $_POST;
			$user->load($data);
			if(!$user->validate($data) || !$user->checkUnique()) {
				$user->getErrors();
				$_SESSION['form_data'] = $data;
			} else {
				$user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
				if ($user->save('user')) {
					$_SESSION['success'] = 'Регистрация прошла успешно!';
				} else {
					$_SESSION['error'] = 'Ошибка при регистрации';
				}
			}

		}
		$this->setMeta('Регистрация');
	}

	public function loginAction(){
		$this->setMeta('Вход');

		if(!empty($_POST)) {
			$user = new User();
		}
	}

	public function logoutAction(){
		
	}

}
