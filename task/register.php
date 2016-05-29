<?php
// require_once("includes/connection.php");
 ?>
<?php include("includes/header.php"); ?>

<div class="mregister">

	<div class="mregister-form">
	<div id="login">
	<h1>Зарегистрироваться</h1>
<form name="registerform" id="registerform" action="register.php" method="post">
	<p>
		<label for="full_name">Имя<br />
		<input type="text" name="full_name" id="full_name" class="input" size="32" value=""  /></label>
	</p>


	<p>
		<label for="email">Email<br />
		<input type="email" name="email" id="email" class="input" value="" size="32" /></label>
	</p>

	<p>
		<label for="username">Логин<br />
		<input type="text" name="username" id="username" class="input" value="" size="20" /></label>
	</p>

	<p>
		<label for="password">Пароль<br />
		<input type="password" name="password" id="password" class="input" value="" size="32" /></label>
	</p>


		<p class="submit">

    <button class="btn btn-sm btn-danger" type="submit" name="register" id="register" >Зарегистрироваться</button>

	</p>

<p class="regtext">Уже зарегистрированы? <button class="btn btn-sm btn-danger"><a href="login.php" >Войти</a></button></p>

</form>

	</div>


<!-- <form method="post">
	<div>Логин <input type="text" name="username" /></div>
	<div>Пароль <input type="password" name="password" /></div>
	<div><input type="submit" value="Зарегистрироваться"></div>
</form> -->
<?php
	include_once "function.php";

if(isset($_POST["register"])){

	if(!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
		$full_name=$_POST['full_name'];
		$email=$_POST['email'];
		$login = mysqli_real_escape_string($db, $_POST['username']);
		$pass  = md5($_POST['password']);
	
	// if (!empty($_POST)) {
	// 	$login = mysqli_real_escape_string($db, $_POST['username']);
	// 	$pass  = md5($_POST['password']);

		$query = mysqli_query($db, "
			SELECT `id` FROM `users` WHERE `username` = '$login';
		");

		$sql="INSERT INTO users
				(full_name, email, username, password)
				VALUES('$full_name','$email', '$login', '$pass')";

		if (mysqli_num_rows($query) == 0) {
			mysqli_query($db, $sql);

			// $result=mysql_query($sql);

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
				echo "Ошибка взаимодействия с БД!";
			}
		  }

		else {
			echo "Такой логин уже занят!";
		}
	}
}
?>





	<?php
//
// if(isset($_POST["register"])){
//
//
// if(!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
// 	$full_name=$_POST['full_name'];
// 	$email=$_POST['email'];
// 	$username=$_POST['username'];
// 	$password=md5($_POST['password']);
//
//
//
// 	$query=mysql_query("SELECT * FROM users WHERE username='".$username."'");
// 	$numrows=mysql_num_rows($query);
//
// 	if($numrows==0)
// 	{
// 	$sql="INSERT INTO users
// 			(full_name, email, username,password)
// 			VALUES('$full_name','$email', '$username', '$password')";
//
// 	$result=mysql_query($sql);
//
//
// 	if($result){
// 	 $message = "Аккаунт создан";
// 	} else {
// 	 $message = "Ошибка";
// 	}
//
// 	} else {
// 	 $message = "Такой логин существует. Попробуйте другой";
// 	}
//
// } else {
// 	 $message = "Необходимо заполнить все поля";
// }
// }
?>


<?php
// if (!empty($message)) {echo "<p class=\"error\">" . $message . "</p>";}
 ?>

<!-- <div class="mregister">

	<div class="mregister-form">
	<div id="login">
	<h1>Зарегистрироваться</h1>
<form name="registerform" id="registerform" action="register.php" method="post">
	<p>
		<label for="user_login">Имя<br />
		<input type="text" name="full_name" id="full_name" class="input" size="32" value=""  /></label>
	</p>


	<p>
		<label for="user_pass">Email<br />
		<input type="email" name="email" id="email" class="input" value="" size="32" /></label>
	</p>

	<p>
		<label for="user_pass">Логин<br />
		<input type="text" name="username" id="username" class="input" value="" size="20" /></label>
	</p>

	<p>
		<label for="user_pass">Пароль<br />
		<input type="password" name="password" id="password" class="input" value="" size="32" /></label>
	</p>


		<p class="submit">

    <button class="btn btn-sm btn-danger" type="submit" name="register" id="register" >Зарегистрироваться</button>

	</p>

<p class="regtext">Уже зарегистрированы? <button class="btn btn-sm btn-danger"><a href="login.php" >Войти</a></button></p>

</form>

	</div>

	<?php
	// include("includes/footer.php");
	?>

</div>

</div> -->
