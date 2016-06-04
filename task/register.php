<?php include("includes/header.php"); ?>

<div class="mregister">

	<div class="mregister-form">
	<div id="login">
	<h1>Зарегистрироваться</h1>
<form name="registerform" id="registerform" action="register.php" method="post">
	<div>
		<label for="full_name">Имя</label>
		<input type="text" name="full_name" id="full_name" class="input" size="32" value=""  />
	</div>


	<div>
		<label for="email">Email</label>
		<input type="email" name="email" id="email" class="input" value="" size="32" />
	</div>

	<div>
		<label for="username">Логин</label>
		<input type="text" name="username" id="username" class="input" value="" size="20" />
	</div>

	<div>
		<label for="password">Пароль</label>
		<input type="password" name="password" id="password" class="input" value="" size="32" />
	</div>


		<p class="submit">

    <button class="btn btn-sm btn-danger" type="submit" name="register" id="register" >Зарегистрироваться</button>

	</p>

<p class="regtext">Уже зарегистрированы? <button class="btn btn-sm btn-danger"><a href="login.php" >Войти</a></button></p>

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
				header("Location: index.php");
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
