<html lang="ru" ng-app="myApp">

<?php

include("includes/header.php");
include_once "function.php";


 $user = getUser();
if (empty($user)) {
  echo "
<div class='b-flex'>

  <div class='widget-box-in col-xs-12 col-sm-8 col-md-5 col-lg-5' id='recent-box' ng-controller='tasksController'>

  <div class='widget-body-in'>
  <div class='task'>
  	<label class='checkbox'>
      <input type='checkbox' value='0' class='tooltip-in' title='Ты можешь отмечать совершенные дела'/>
  	<div class='task-content task-content-in'>
  	<p>Привет</p>
  	<p class='task-content__date'>добавлено: 2016-06-05</p>
    </div>
  	<a class=''><i class='glyphicon glyphicon-trash tooltip-del' title='Ты можешь удалять записи'></i></a>
      </label>
  </div>

  <div class='task'>
    <label class='checkbox'>
      <input type='checkbox' value='0' class='tooltip-in' title='Ты можешь отмечать совершенные дела'/>
    <div class='task-content'>
    <p>здесь ты можешь</p>
    <p class='task-content__date'>добавлено: 2016-06-05</p>
    </div>
    <a class=''><i class='glyphicon glyphicon-trash tooltip-del' title='Ты можешь удалять записи'></i></a>
      </label>
  </div>

  <div class='task'>
    <label class='checkbox'>
      <input type='checkbox' value='0' class='tooltip-in' title='Ты можешь отмечать совершенные дела'/>
    <div class='task-content'>
    <p>записывать важные дела</p>
    <p class='task-content__date'>добавлено: 2016-06-05</p>
    </div>
    <a class=''><i class='glyphicon glyphicon-trash tooltip-del' title='Ты можешь удалять записи'></i></a>
      </label>
  </div>

  <div class='task'>
    <label class='checkbox'>
      <input type='checkbox' value='0' class='tooltip-in' title='Ты можешь отмечать совершенные дела'/>
    <div class='task-content'>
    <p>которые предстоит совершить</p>
    <p class='task-content__date'>добавлено: 2016-06-05</p>
    </div>
    <a class=''><i class='glyphicon glyphicon-trash tooltip-del' title='Ты можешь удалять записи'></i></a>
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
<!-- <noscript>
	<div class="nojs">
		<a href="http://goo.gl/d5o4zF" target="_blank" rel="nofollow"></a>
	</div>
</noscript> -->
</div>

<div ng-app="myApp" ng-controller="myCtrl" class="">
		<div class="b-main">
				<div ng-include src="'partials/task.html'"></div>
		</div>
</div>


<div class="widget-filter col-lg-2 col-md-2 col-sm-3 col-xs-12">
  <div class="widget-filter_item-title">Мои задачи по категориям</div>
  <button class="study-filter widget-filter_item btn btn-danger" data-num="1">учеба</button>
  <button class="work-filter widget-filter_item btn btn-danger"  data-num="2">работа</button>
  <button class="aims-filter widget-filter_item btn btn-danger"  data-num="3">цели</button>
  <button class="other-filter widget-filter_item btn btn-danger" data-num="4">другое</button>
  <button class="widget-filter_item btn btn-danger"  data-num="5">все</button>
</div>




<?php include("includes/footer.php"); ?>

 <?php
}
?>


<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="tooltipster/dist/js/tooltipster.bundle.min.js"></script>
<script>
// activate tooltip and options
$(document).ready(function() {
	$('.tooltip-in').tooltipster({
		 animation: 'fade',
		 delay: 50,
		 theme: 'tooltipster-light',
		 trigger: 'hover'
	});

  $('.tooltip-del').tooltipster({
     animation: 'fade',
     delay: 50,
     theme: 'tooltipster-light',
     trigger: 'hover'
  });

});

</script>
