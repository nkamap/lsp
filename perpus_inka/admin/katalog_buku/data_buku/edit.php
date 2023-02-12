<?php
include_once("../../../class/buku.php");

$id = $_GET["id"];

$buku = new buku;
$buku->delete($id);

header("location: index.php");
?>