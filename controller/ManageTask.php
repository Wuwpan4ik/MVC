<?php 
	class ManageTask extends ACore {
		protected function obr($method) {
			switch($method) {
				case 'ReadyTask': 
					$this->ReadyTask();
					break;
				case 'DeleteTask':
					$this->DeleteTask();
					break;
				case 'DeleteAllTask':
					$this->DeleteAllTask();
					break;
				case 'ReadyAllTask':
					$this->ReadyAllTask();
					break;
				case 'UnreadyTask':
					$this->UnreadyTask();
					break;
				case 'AddTask':
					$this->AddTask();
					break;
				default:
					break;
			}
		}

		protected function DeleteTask() {
			$task_id = $_GET['task_id'];
			$this->m->db->execute("DELETE FROM `tasks` WHERE id = '$task_id'");
		}

		protected function AddTask() {
			$text = $_POST['task__text'];
			$this->m->db->execute("INSERT INTO `tasks` (`user_id`, `description`) VALUES ('". $_SESSION['id'] ."', '". $text ."')");
		}

		protected function DeleteAllTask() {
			$tasks = ($this->m->db->query("SELECT * FROM `tasks` WHERE user_id = '". $_SESSION['id'] ."'"));
			foreach ($tasks as $task) {
				$this->m->db->execute("DELETE FROM `tasks` WHERE id = '". $task['id'] ."'");
			}
		}

		protected function ReadyAllTask() {
			$tasks = ($this->m->db->query("SELECT * FROM `tasks` WHERE user_id = '". $_SESSION['id'] ."'"));
			foreach ($tasks as $task) {
				$this->m->db->execute("UPDATE `tasks` SET `status` = 'Ready' WHERE id = '". $task['id'] ."'");
			}
		}

		protected function ReadyTask() {
			$task_id = $_GET['task_id'];
			$this->m->db->execute("UPDATE `tasks` SET `status` = 'Ready' WHERE id = '$task_id'");
		}

		protected function UnreadyTask() {
			$id_task = $_GET['task_id'];
			$this->m->db->execute("UPDATE `tasks` SET `status` = 'Unready' WHERE id = '". $id_task ."'");
		}

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