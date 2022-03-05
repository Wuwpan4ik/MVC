<?php 
	class ManageTask extends ACore {

		final function checkUserTask($task_id) {
			$a = $this->m->db->query("SELECT `user_id` FROM `tasks` WHERE id = '$task_id'");
			return ($a[0]['user_id'] == $_SESSION['id']) ? True : False;
		}

		public function DeleteTask() {
			if ($this->checkUserTask($_GET['task_id'])) {
				$this->m->db->execute("DELETE FROM `tasks` WHERE id = '" . $_GET['task_id']. "'");
			} else {
				return False;
			}
		}

		public function AddTask() {
			$this->m->db->execute("INSERT INTO `tasks` (`user_id`, `description`) VALUES ('". $_SESSION['id'] ."', '". $_POST['task__text'] ."')");
		}

		public function DeleteAllTask() {
			$this->m->db->execute("DELETE FROM `tasks` WHERE user_id = '". $_SESSION['id'] ."'");
		}

		public function ReadyAllTask() {
			$this->m->db->execute("UPDATE `tasks` SET `status` = 'Ready' WHERE user_id = '". $_SESSION['id'] ."'");
		}

		public function ReadyTask() {
			if ($this->checkUserTask($_GET['task_id'])) {
				$this->m->db->execute("UPDATE `tasks` SET `status` = 'Ready' WHERE id = '" . $_GET['task_id']. "'");
			} else {
				return False;
			}
		}

		public function UnreadyTask() {
			if ($this->checkUserTask($_GET['task_id'])) {
				$this->m->db->execute("UPDATE `tasks` SET `status` = 'Unready' WHERE id = '" . $_GET['task_id']. "'");
			} else {
				return False;
			}
		}

		public function obr() {}

		public function get_content() {
			echo '<!DOCTYPE html>
			<html lang="en">
			<head>
			<meta charset="UTF-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Document</title>
			</head>
			<body>
				<script>
					window.location.replace("?option=main");
				</script>
			</body>
			</html>';
		}
	}
?>