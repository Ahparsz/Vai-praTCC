<?php
include('connection.php');

if (isset($_SESSION['usuario'])){
	$codigo = $_GET['codigo'];
    $sql = " DELETE FROM `cidade` WHERE `cidade`.`cd_cidade`= ".$_GET['codigo'];
if(!$mysqli->query($sql)){
	echo $mysqli->error;
}else{
	header('location:.php');
   }

}

?>