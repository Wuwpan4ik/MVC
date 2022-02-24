<?php 
	session_start();
	header("Content-Type:text/html;charset=UTF-8");

	spl_autoload_register(function($class) {
		if(file_exists("controller/".$class.".php")) {
			require_once 'controller/'.$class.'.php';
		} else {
			require_once "model/model.php";
		}
	});

	if($_GET['option']) {
		$class = trim(strip_tags($_GET['option']));
		$method = trim(strip_tags($_GET['method']));
	}
	else {
		$class = 'Main';	
	}

	if(class_exists($class)) {
	
		$obj = new $class;
		$obj->get_body($class, $method);

	}
	else {
		exit("<p>Нет данных для входа</p>");
	}

?>