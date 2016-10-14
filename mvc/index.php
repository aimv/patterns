<?php

require_once 'conf/config.php'; //for Smarty templates

require_once 'model.php';

class UserController {
	
	public $userModel;
	
	public function __construct(UserModel $user) {
		$this->userModel = $user;
	}
	
	public function changeUser($request) {
		if (isset($request['name']) && isset($request['lastname']) && isset($request['birthdate'])) {
			$this->userModel->setUserData($request['name'], $request['lastname'], $request['birthdate']);
			return true;
		} else {
			return false;
		}
	}
}

class UserView {
	public $userModel;
	private $smarty;
	
	public function __construct(UserModel $user) {
		$this->userModel = $user;
		$this->smarty = new Smarty();
		$this->smarty->template_dir = './templates/';
		$this->smarty->compile_dir = './templates_c/';
		$this->smarty->cache_dir = './cache/';
		$this->smarty->caching=false;
	}
	
	public function view() {
		if ($this->userModel->isComplete()) {
			$this->smarty->assign('name', $this->userModel->getName());
			$this->smarty->assign('lastname', $this->userModel->getLastname());
			$this->smarty->assign('birthdate', date("Y-m-d", $this->userModel->getBirthdate()));
			$this->smarty->assign('code', $this->userModel->getPersonalCode());
			$this->smarty->display('index.tpl.htm');
			return true;
		} else {
			return false;
		}
	}
	
}


//usage

$user = new UserModel();
$user->setUserData("John", "Smith", "1980-01-02");

$userController = new UserController($user);

//via form or http://localhost/patterns/mvc/?name=Molly&lastname=Malone&birthdate=1880-08-09
if (isset($_REQUEST['name']) && isset($_REQUEST['lastname']) && isset($_REQUEST['birthdate'])) {
	$userController->changeUser(
			array('name' => $_REQUEST['name'], 'lastname' => $_REQUEST['lastname'], 'birthdate' => $_REQUEST['birthdate'])
		);
}

$userView = new UserView($userController->userModel);

$userView->view();