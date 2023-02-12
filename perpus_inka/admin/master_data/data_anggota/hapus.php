<?php
include_once("../../../class/user.php");

$id = $_GET["id"];

$user = new user;
$user->delete($id);
// $user->delete(3);

header("location: index.php");
?>