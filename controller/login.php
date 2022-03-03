<?php 
	class Login extends ACoreAdmin {
		public function obr() {
			$login = $_POST['login'];
			$password = $_POST['password'];
			if(isset($_POST['register'])) {
				if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])) {
					if ($_POST['password'] == $_POST['confirm_password']) {
						if  (count($this->db->db->query("SELECT * FROM `users` WHERE `login` ='" . $login . "'")) == 0) {
							$text = "INSERT INTO `users` (`login`, `password`) VALUES ('". $login ."', '". $password ."')";
							$this->db->db->execute($text);
							$_SESSION['id'] = $this->db->db->query("SELECT `id` FROM `users` WHERE `login` ='" . $login . "'")[0]['id'];
							$this->redirect();
						} else {
							$_SESSION['message'] = 'Данный логин занят';
						}
					} else {
						$_SESSION['message'] = 'Пароли разные';
					};
				} else {
					$_SESSION['message'] = 'Все поля должны быть заполнены';
				};
			};
			if(isset($_POST['auth'])) {
				if (!empty($_POST['login']) && !empty($_POST['password'])) {
					if (count($this->db->db->query("SELECT * FROM `users` WHERE `login` =" . '\'' . $login . '\'' . " AND `password` =" . '\'' .$password .'\'')) > 0) {
						$message = 'Вы успешно авторизовались!';
						$_SESSION['id'] = $this->db->db->query("SELECT `id` FROM `users` WHERE `login` ='" . $login . "'")[0]['id'];
						$this->redirect();
					} else { 
						$_SESSION['message'] = 'Неверный пароль';
					}
				} else {
					$_SESSION['message'] = 'Все поля должны быть заполнены';
				};
			}
		}
		public function get_content() {
		}
		public function redirect() {
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