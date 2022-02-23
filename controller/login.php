<?php 
	class login extends ACore_admin {
		protected function obr() {
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
								exit('Данный логин занят');
							}
						} else {
							exit('Пароли разные!');
						};
					} else {
						exit('Все поля должны быть заполнены!');
					};
				};
				if(isset($_POST['auth'])) {
					if (!empty($_POST['login']) && !empty($_POST['password'])) {
						if (count($this->db->db->query("SELECT * FROM `users` WHERE `login` =" . '\'' . $login . '\'' . " AND `password` =" . '\'' .$password .'\'')) > 0) {
							$message = 'Вы успешно авторизовались!';
							$_SESSION['id'] = $this->db->db->query("SELECT `id` FROM `users` WHERE `login` ='" . $login . "'")[0]['id'];
							$this->redirect();
						} else { 
							$message = 'Неправильный пароль';
						}
					} else {
						exit('Все поля должны быть заполнены!');
					};
				}
		}
		public function get_content() {
echo <<<ECHO
<div class="main">
<div class="form">
<div class="form__top">
<button id="changeFormBtn" class="form__top-btn active" onclick="changeModsAuth()">Авторизация</button><button id="changeFormBtn" class="form__top-btn" onclick="changeModsAuth()">Регистрация</button>
</div>
<div class="form__main">
<form action="" class="main__form active" id="changeForm" method="POST">
<input name="login" class="form__input" placeholder="Введите логин">
<input name="password" type='password' class="form__input" placeholder="Введите Пароль">
<button type="submit" class="form__btn btn" name="auth">Отправить</button>
</form>
<form action="" class="main__form" id="changeForm" method="POST">
<input name="login" class="form__input" placeholder="Введите логин">
<input name="password" type='password' class="form__input" placeholder="Введите пароль">
<input name="confirm_password" type='password' class="form__input" placeholder="Подтвердите пароль">
<button type="submit" class="form__btn btn" name="register">Отправить</button>
</form>
</div>
</div>
ECHO;
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