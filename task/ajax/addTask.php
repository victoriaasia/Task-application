<?php

require_once '../includes/constants.php';
include_once "../function.php";
$user = getUser(true);

if(isset($_GET['task'])){
$task = $_GET['task'];
$status = "0";
$created = time();


$query="INSERT INTO tasks(task,status,created_at,id_user)  VALUES ('$task', '$status', '$created', '{$user['id']}')";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$result = $mysqli->affected_rows;

echo $json_response = json_encode($result);
}
?>
