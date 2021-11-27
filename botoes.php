<?php
include 'conexao.php';

//AQUI QUANDO APERTAR EM FAVORITAR
if(isset($_POST['favoritar'])) {
    $favoritar = $_POST['favoritar'];
    $insert = "INSERT INTO favorito (id_cidade, id_usuario) VALUES ('".$_SESSION['cd_cidade']."', '".$_SESSION['usuario']."')";
        if ($mysqli->query($insert)=== TRUE){
            echo 'Favoritado';
        }
	}
?>