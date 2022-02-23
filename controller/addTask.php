<?php 
	class addTask extends ACore {
		protected function obr() {
			$text = $_POST['task__text'];
			$this->m->db->execute("INSERT INTO `tasks` (`user_id`, `description`) VALUES ('". $_SESSION['id'] ."', '". $text ."')");
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