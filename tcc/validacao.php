<?php
//AQUI É A VALIDAÇÃO
include 'conexao.php';
include 'header.php';

if (!empty($_POST) AND (empty($_POST['user']) OR empty($_POST['senha']))) {
    header("Location: index.php"); exit;
}

$user = $_POST['user'];
$senha = $_POST['senha'];

$sql = "SELECT `cd_usuario`, `user`, `nivel` FROM `usuario` WHERE (`user` = '".$_POST['user']."') AND (`senha` = '".$_POST['senha']."') AND (`ativo` = 1) LIMIT 1";
if($query = $mysqli->query($sql)){

	if($query->num_rows==1){
		while($dados = $query->fetch_object()){
			$_SESSION['usuario'] = $dados->cd_usuario;
			$_SESSION['user'] = $dados->user;
            $_SESSION['nivel'] = $dados->nivel;
            header("Location: restrito.php");
        }
	}else{
    	header("Location: login.php");
    }
}
?>