<?php
abstract class ACore_Admin {
	
	public $db;
	
	public function __construct() {
		$this->db = new Task();
	}
	
	public function get_body($tpl, $method) {
		if($_POST || $_GET['del']) {
			$this->obr($method);
		}
		$this->get_content();
		include "template/index.php";
	}
	
	abstract function get_content();
}