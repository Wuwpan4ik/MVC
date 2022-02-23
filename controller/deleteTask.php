<?php 
	class deleteTask extends ACore {
		protected function obr() {
			$task_id = $_GET['task_id'];
			$this->m->db->execute("DELETE FROM `tasks` WHERE id = '$task_id'");
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