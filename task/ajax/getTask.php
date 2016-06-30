<?php
require_once '../includes/constants.php';
include_once "../function.php";
$user = getUser(true);
$status = '%';

if(isset($_GET['status'])){
$status = $_GET['status'];
}
$query="select ID, TASK, STATUS, CREATED_AT, ID_TYPE from tasks where status like '$status' and `id_user` = {$user['id']} order by status,id desc";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$arr = array();
if($result->num_rows > 0) {
	// get assoc arr
	while($row = $result->fetch_assoc()) {
		$arr[] = $row;
	}
}

echo $json_response = json_encode($arr);
?>
