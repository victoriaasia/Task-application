<?php

require_once '../includes/constants.php';
include_once "../function.php";
$user = getUser(true);

if(isset($_GET['task'])){
$task = $_GET['task'];
$status = "0";
$created = date("Y-m-d H:i:s");
// $type = $_GET['id_task'];
$type = $_GET['group'];


$query="INSERT INTO tasks(task,status,created_at,id_user, id_type)  VALUES ('$task', '$status', '$created', '{$user['id']}', '$type')";
//quick query. get result = command to query the database or die
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
// get num of rows
$result = $mysqli->affected_rows;

// get json data value
echo $json_response = json_encode($result);
}
?>
