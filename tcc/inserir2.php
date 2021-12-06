<?php

include 'conexao.php';

if (!isset($_SESSION)) session_start();

if (isset($_SESSION['usuario'])){
    $usuario = $_SESSION['usuario'];
    $user = $_SESSION['user'];
}

  //INSERINDO A CIDADE
if (isset($_POST['cidade']) && isset($_POST['clima']) && isset($_POST['ambiente']) && isset($_POST['tipo'])){
    $estado =$_POST['estado'];
    $cidade_nome = $_POST['cidade'];
    $info = $_POST['info'];
    $coordenadas = $_POST['coordenadas'];
    
    $insert_cidade = "INSERT INTO cidade (cd_cidade, id_estado, nm_cidade, info, coordenadas, foto) VALUES (null,'".$estado."', '".$cidade."', '".$info."', '".$coordenadas."', null)";
    
    if (!$mysqli->query($insert_cidade)=== TRUE){

        if($query = $mysqli->query("select * from cidade where nm_cidade = '".$cidade_nome."' and info = '".$info."'")){
            while($data = $query->fetch_object()){
                echo $data->cd_cidade;
            }
        }

        header('restrito.php');
    }
    else{
        echo "yo";
    }
}
?>