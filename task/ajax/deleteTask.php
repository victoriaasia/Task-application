<?php
require_once '../includes/constants.php';
include_once "../function.php";

if(isset($_GET['taskID'])){
$taskID = $_GET['taskID'];
$user = getUser(true);

$query="delete from tasks where id='$taskID' and id_user='{$user['id']}'";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$result = $mysqli->affected_rows;

echo $json_response = json_encode($result);
}
?>
