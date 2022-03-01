<?php
abstract class ACore {
	
	protected $m;
	
	public function __construct() {
		if(!$_SESSION['id']) {
			header("Location:?option=login");
		}
		$this->m = new Task;
	}

	public function get_body($tpl) {
		$content = $this->get_content();
		//$tpl - template
		include "template/index.php";
	}
	
	abstract function get_content();
	
}

?>