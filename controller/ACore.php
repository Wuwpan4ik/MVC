<?php
abstract class ACore {
	
	protected $m;
	
	public function __construct() {
		if(!$_SESSION['id']) {
			header("Location:?option=login");
		}
		$this->m = new Task;
	}

	protected function get_header() {
		echo'<!DOCTYPE html>
				<html lang="en">

				<head>
					<meta charset="UTF-8">
					<meta http-equiv="X-UA-Compatible" content="IE=edge">
					<meta name="slurp" content="noydir" />
					<meta name="viewport" content="width=device-width, initial-scale=1.0">
					<link rel="stylesheet" href="../assets/css/node_modules/normalize.css/normalize.css">
					<link rel="stylesheet" href="../assets/css/main.css">
					<title>TaskApp</title>
				</head>
				<body>';
	}
	protected function get_footer() {
		echo '<script src="../assets/js/js.js"></script>
		</body>
		</html>';
	}

	public function get_body($tpl) {
		if($_POST || $_GET['del']) {
			$this->obr();
		}
		$this->get_header();
		$content = $this->get_content();
		$this->get_footer();
		//$tpl - template
		include "template/index.php";
	}
	
	abstract function get_content();
	
}

?>