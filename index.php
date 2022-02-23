<?php 
	session_start();
	header("Content-Type:text/html;charset=UTF-8");
	require_once 'model/model.php';

	spl_autoload_register(function($c) {
		if(file_exists("controller/".$c.".php")) {
			require_once "controller/".$c.".php";
		}
	});

	if($_GET['option']) {
		$class = trim(strip_tags($_GET['option']));
	}
	else {
		$class = 'main';	
	}

	if(class_exists($class)) {
	
		$obj = new $class;
		$obj->get_body($class);

	}
	else {
		exit("<p>Нет данных для входа</p>");
	}

?>