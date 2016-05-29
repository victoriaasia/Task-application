<?php

include_once "function.php";

if (isset($_COOKIE['s'])) {
  $s = $_COOKIE['s'];

  mysqli_query($db, "
    DELETE FROM `connect`
    WHERE `session` = '$s';
  ");
}
setcookie('s', '');
setcookie('t', '');
header("Location: index.php");

?>
