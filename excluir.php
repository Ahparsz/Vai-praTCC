<?php
include('conexao.php');

//APAGA CIDADE
if (isset($_SESSION['usuario'])){
	$codigo_cidade = $_SESSION['id_cidade'];
    $sql = " DELETE FROM `favorito` WHERE `cidade`.`cd_cidade`= ".$codigo_cidade;
		if(!$mysqli->query($sql)){
			echo $mysqli->error;
		}else{
			header('location:restrito.php');
   		}
}

//APAGA FAVORITO
if (isset($_SESSION['usuario'])){
	$codigo_favorito = $_GET['codigo_favorito'];
    $sql = " DELETE FROM `favorito` WHERE `favorito`.`cd_favorito`= ".$codigo_favorito;
		if(!$mysqli->query($sql)){
			echo $mysqli->error;
		}else{
			header('location:perfil.php');
   		}
}

//APAGA ESTADO
if (isset($_SESSION['usuario'])){
	$codigo_estado = $_GET['codigo_estado'];
    $sql = " DELETE FROM `estado` WHERE `estado`.`cd_estado`= ".$_GET['codigo_estado'];
		if(!$mysqli->query($sql)){
			echo $mysqli->error;
		}else{
			header('location:restrito.php');
   		}
}

?>