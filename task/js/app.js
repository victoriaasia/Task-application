// erase prev text in textarea
function eraseText() {
document.getElementById("comment").value = "";
}

// angular module for app
var app = angular.module('myApp', []);

app.controller('tasksController', function($scope, $http) {
  getTask();

  function getTask() {
  $http.post("ajax/getTask.php").success(function(data) {
        $scope.tasks = data;
       });
  };

  $scope.addTask = function (task) {

    var radios = document.getElementsByName('group');
      var selectedRadio = null;
      for (var i = 0; i < radios.length; i++) {
          if (radios[i].checked === true) {
              selectedRadio = radios[i];
              break;
          }
      }
      var group = encodeURI(selectedRadio.value);


	    var comment = document.getElementById('comment').value;
	    if (comment == '') {
	        alert ('Введите текст');
        return false;
	    }


    $http.post("ajax/addTask.php?task="+task+"&group="+group).success(function(data){
        getTask();
        // $scope.taskInput = "";
      });
  };

  $scope.deleteTask = function (task) {
    if(confirm("Удалить запись?")) {
    $http.post("ajax/deleteTask.php?taskID="+task).success(function(data) {
        getTask();
      });
    }
  };

  $scope.toggleStatus = function(item, status, task) {
    if(status=='1') {
      status='0';
    }
    else {
      status='1';
    }
      $http.post("ajax/updateTask.php?taskID="+item+"&status="+status).success(function(data) {
        getTask();
      });
  };

  // $scope.editTask = function (task) {
  //       $http.post("ajax/editTask.php?taskID="+task).success(function(data) {
  //       getTask();
  //     });
  // };

});



// random background image
app.factory("bgImage", function($http) {

  var bgImage = {},
    remoteAPI = "http://www.splashbase.co/api/v1/images/random";

  bgImage.getImages = function() {
    return $http({
      method: "GET",
      url: remoteAPI
    });
  }
  return bgImage;
});

app.controller("myCtrl", function($scope, bgImage) {

  bgImage.getImages().success(function(response) {
    document.body.style.backgroundImage = "url(" + response.url + ")";
  });
});
