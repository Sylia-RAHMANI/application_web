<?php
include_once('config.php');
$con = mysqli_connect("localhost","root","","jeu");
$id_pays = (isset($_GET['id_pays']) ? intval($_GET['id_pays']) :21);

$query= "SELECT * FROM countries WHERE id_pays>= '$id_pays' order by rand() limit 1";
$result= mysqli_query($con, $query);
?>