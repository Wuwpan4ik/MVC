<?php 
	class readyAllTask extends ACore {
		protected function obr() {
			$tasks = ($this->m->db->query("SELECT * FROM `tasks` WHERE user_id = '". $_SESSION['id'] ."'"));
			foreach ($tasks as $task) {
				$this->m->db->execute("UPDATE `tasks` SET `status` = 'ready' WHERE id = '". $task['id'] ."'");
			}
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