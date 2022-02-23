<?php 
	class Task {
		public $db;

		public function __construct() {
			require_once 'connect.php';
			$this->db = new Database();
		}

		public function deleteTask($id_task) {
			$db->execute("DELETE FROM `tasks` WHERE id = '". $id_task ."'");
			redirect();
		}
		
		public function viewTasks() {
			$result = $this->db->query("SELECT `description`, `status`, `id` FROM `tasks` WHERE user_id = '". $_SESSION['id'] ."'");
			return $result;
		}
	}
?>