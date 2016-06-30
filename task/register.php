<?php include("includes/header.php"); ?>

<div class="mregister">

	<div class="mregister-form col-xs-8 col-sm-10 col-md-12 col-lg-12">
	<div id="login">
	<h1>Регистрация</h1>
<form name="registerform" id="registerform" action="register.php" method="post">
	<div class="styled-input wide">
		<input type="text" name="full_name" id="full_name" class="input" size="32" value="" required />
		<label for="full_name">Имя</label>
	</div>


	<div class="styled-input wide">
		<input type="email" name="email" id="email" class="input" value="" size="32" required/>
		<label for="email">Email</label>
	</div>

	<div class="styled-input wide">
		<input type="text" name="username" id="username" class="input" value="" size="20" readonly onfocus="this.removeAttribute('readonly')" required/>
		<label for="username">Логин</label>
	</div>

	<div class="styled-input wide">
		<input type="password" name="password" id="password" class="input" value="" size="32" readonly onfocus="this.removeAttribute('readonly')" required/>
		<label for="password">Пароль</label>
	</div>


		<p class="submit">

    <button class="btn btn-md btn-danger" type="submit" name="register" id="register" >Зарегистрироваться</button>

	</p>

<p class="regtext">
	<span>Уже зарегистрированы? </span>
	<button class="btn btn-md btn-danger"><a href="login.php" >Войти</a></button>
</p>

</form>

	</div>

<?php
	include_once "function.php";

if(isset($_POST["register"])){

	if(!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
		$full_name=$_POST['full_name'];
		$email=$_POST['email'];
		$login = mysqli_real_escape_string($db, $_POST['username']);
		$pass  = md5($_POST['password']);

		$query = mysqli_query($db, "
			SELECT `id` FROM `users` WHERE `username` = '$login';
		");

		$sql="INSERT INTO users
				(full_name, email, username, password)
				VALUES('$full_name','$email', '$login', '$pass')";

		if (mysqli_num_rows($query) == 0) {
			mysqli_query($db, $sql);

			if (mysqli_errno($db) == 0) {
				$id = mysqli_insert_id($db);
				$session = getHash();
				$token   = getHash();

				mysqli_query($db, "
					INSERT INTO `connect` SET
						`id_user` = $id,
						`session` = '$session',
						`token`   = '$token';

				");

				setcookie('s', $session);
				setcookie('t', $token);
				header("Location: login.php");
			}

			else {
				echo "<p class=\"errorB\"> <span>Ошибка взаимодействия с БД!</span></p>";
			}
		  }

		else {
			echo "<p class=\"errorB\"> <span>Такой логин уже занят!</span></p>";
		}
	}
}
?>

<?php include("includes/footer.php"); ?>
