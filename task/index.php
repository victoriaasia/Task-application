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

 <div id="welcome">
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

<div ng-app="myApp" ng-controller="myCtrl">

<div class="row">
		<div class="container">
			<div class="col-sm-8 b-main">
				<div ng-include src="'partials/task.html'"></div>
			</div>
		</div>
	</div>


</div>

<script type="text/javascript" src="js/angular.min.js"></script>
<script type="text/javascript" src="app/app.js"></script>
<script>
var _loading_spinner=setInterval(function(){if(document.readyState=='complete'){
var $page_loading = document.getElementById('page_loading'),
		$body = document.body || document.getElementsByTagName('body')[0],
		speed = 500, delay = 3000;
if((typeof $page_loading != 'undefined') && ($page_loading != null)){
	setTimeout(function(){
		var transition = 'opacity ' + speed.toString() + 'ms ease',
				removeCssClass = function(obj, className){
					obj.className = obj.className.replace(className, '').replace('  ', ' ');
				};
		['-webkit-transition','-moz-transition','transition'].forEach(function(prefix){
			$page_loading.style[prefix] = transition;
		});
		$page_loading.style['opacity'] = '0';
		$page_loading.style['filter']  = 'alpha(opacity=0)';
		removeCssClass($body, 'noscroll');
		setTimeout(function(){
			$page_loading.parentNode.removeChild($page_loading);
		}, speed + 10);
	}, delay);
}
clearInterval(_loading_spinner);
}},10);

</script>


 <?php
}
?>


    </body>
</html>
