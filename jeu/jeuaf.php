<?php
include_once('../include/config.php');
$con = mysqli_connect("localhost","root","","jeu");
$id_pays = (isset($_GET['id_pays']) ? intval($_GET['id_pays']) :1);
$query= "SELECT * FROM countries WHERE nom_continent= 'Afrique' AND id_pays>= '$id_pays' ";
$result= mysqli_query($con, $query);
?>