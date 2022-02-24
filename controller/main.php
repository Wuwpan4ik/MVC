<?php 
	class Main extends ACore {
		public function get_content() {
			$result = $this->m->viewTasks();
			return $result;
		}
	}
?>