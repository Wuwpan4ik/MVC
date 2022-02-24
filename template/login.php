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
<div style='text-align:center; color: red; font-size:21px;margin-top:15px;'>
<?php 
	if (isset($_SESSION['message']))
	{
		echo htmlspecialchars($_SESSION['message']);
		unset($_SESSION['message']);
	}
?>
</div>
</div>
</div>