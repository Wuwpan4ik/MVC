<?php 
	class main extends ACore {
		public function get_content() {
			$result = $this->m->viewTasks();
			return $result;
		}
	}
?>