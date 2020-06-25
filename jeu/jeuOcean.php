<?php
include_once('../include/config.php');
$con = mysqli_connect("localhost","root","","jeu");
$id_pays = (isset($_GET['id_pays']) ? intval($_GET['id_pays']) :41);
$query= "SELECT * FROM countries WHERE nom_continent= 'Océanie' and id_pays>= '$id_pays' limit 1";
$result= mysqli_query($con, $query);
?>