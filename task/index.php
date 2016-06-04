<html lang="ru" ng-app="myApp">

<?php

include("includes/header.php");
include_once "function.php";


 $user = getUser();
if (empty($user)) {
  echo "
  <div id='welcome_index'>
    <a href='register.php'><button class='btn btn-sm btn-danger'>Зарегистрируйтесь</button></a>
    <a href='login.php'><button class='btn btn-sm btn-danger'>Авторизуйтесь</button></a>
  </div>
   ";
 }
 else {
?>

 <div id="welcome" class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
   <h2>Привет, <span> <?php echo $user['username'];?></span></h2>
    <a href="logout.php"><button class="btn btn-sm btn-danger">Выйти</button></a>
</div>

<body ng-controller="tasksController" class="noscroll">

<div id="page_loading" class="dark">
<div class="loader"><div><div></div></div></div>
<noscript>
	<div class="nojs">
		<a href="http://goo.gl/d5o4zF" target="_blank" rel="nofollow"></a>
	</div>
</noscript>
</div>

<div ng-app="myApp" ng-controller="myCtrl" class="col-lg-6 col-md-6 col-sm-8 col-xs-12">

<!-- <div class="row">
		<div class="container"> -->
			<div class="b-main">
				<div ng-include src="'partials/task.html'"></div>
			</div>
		<!-- </div>
	</div> -->


</div>


<?php include("includes/footer.php"); ?>


 <?php
}
?>
