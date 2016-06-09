<html lang="ru" ng-app="myApp">

<?php

include("includes/header.php");
include_once "function.php";


 $user = getUser();
if (empty($user)) {
  echo "

<div class='b-flex'>

  <div class='widget-box-in col-xs-12 col-sm-8 col-md-5 col-lg-5' id='recent-box' ng-controller='tasksController'>

  <div class='widget-body'>
  <div class='task'>
  	<label class='checkbox'>
      <input type='checkbox' value='0'/>
  	<div class='task-content task-content-in'>
  	<p>Привет</p>
  	<p class='task-content__date'>добавлено: 2016-06-05</p>
    </div>
  	<a class='pull-right'><i class='glyphicon glyphicon-trash'></i></a>
      </label>
  </div>

  <div class='task'>
    <label class='checkbox'>
      <input type='checkbox' value='0'/>
    <div class='task-content'>
    <p>здесь ты можешь</p>
    <p class='task-content__date'>добавлено: 2016-06-05</p>
    </div>
    <a class='pull-right'><i class='glyphicon glyphicon-trash'></i></a>
      </label>
  </div>

  <div class='task'>
    <label class='checkbox'>
      <input type='checkbox' value='0'/>
    <div class='task-content'>
    <p>записывать важные дела</p>
    <p class='task-content__date'>добавлено: 2016-06-05</p>
    </div>
    <a class='pull-right'><i class='glyphicon glyphicon-trash'></i></a>
      </label>
  </div>

  <div class='task'>
    <label class='checkbox'>
      <input type='checkbox' value='0'/>
    <div class='task-content'>
    <p>которые предстоит совершить</p>
    <p class='task-content__date'>добавлено: 2016-06-05</p>
    </div>
    <a class='pull-right'><i class='glyphicon glyphicon-trash'></i></a>
      </label>
  </div>

  <div id='welcome_index'  class='col-lg-3 col-lg-3 col-xs-12 col-sm-2 col-md-3'>
    <a href='register.php'><button class='btn btn-md btn-danger'>Регистрация</button></a>
    <a href='login.php'><button class='btn btn-md btn-danger'>Авторизация</button></a>
  </div>

  </div>
  </div>
  </div>

   ";
 }
 else {
?>

 <div id="welcome" class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
   <h2>Привет, <span> <?php echo $user['username'];?></span></h2>
    <a href="logout.php"><button class="btn btn-md btn-danger">Выйти</button></a>
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

<div ng-app="myApp" ng-controller="myCtrl" class="">
		<div class="b-main">
				<div ng-include src="'partials/task.html'"></div>
		</div>
</div>


<?php include("includes/footer.php"); ?>


 <?php
}
?>
