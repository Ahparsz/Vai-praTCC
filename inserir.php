<?php
	include 'conexao.php';
	include 'css/header.php';

if (!isset($_SESSION)) session_start();

if (isset($_SESSION['usuario'])){
    $usuario = $_SESSION['usuario'];
    $user = $_SESSION['user'];
}

if (isset($_POST['estado']) && isset($_POST['cidade']) && isset($_POST['info']) && isset($_POST['coordenadas']) && isset($_FILES['foto'])){
    $estado =$_POST['estado'];
    $cidade = $_POST['cidade'];
    $info = $_POST['info'];
    $coordenadas = $_POST['coordenadas'];
    $foto = $_FILES['foto'];
    
    $insert = "insert into cidade (cd_cidade, id_estado, nm_cidade, info, coordenadas, foto) values (null, ".$estado.", '".$cidade."', '".$info."', '".$coordenadas."', '".$foto."')";
    if ($mysqli->query($insert)===TRUE){
        if($query = $mysqli->query("select * from cidade where nm_cidade = '".$cidade."' and info = '".$info."'")){
            while($dados = $query->fetch_object()){
                echo $dados->cd_cidade;

                if(isset($_FILES['foto'])){
                    $errors= array();
                    $file_name = $_FILES['foto']['name'];
                    $file_size =$_FILES['foto']['size'];
                    $file_tmp =$_FILES['foto']['tmp_name'];
                    $file_type=$_FILES['foto']['type'];
                    
                    $extensions= array("jpeg","jpg","png");
                    
                    $extension = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
                    
                    if($file_size > 2097152){
                       $errors[]='File size must be excately 2 MB';
                    }
                    
                    if(empty($errors)==true){
                       move_uploaded_file($file_tmp,"img/cidade/".$dados->cd_cidade.".jpg");
                       echo "Success";
                    }else{
                       print_r($errors);
                    }
                }
            }
            header('Location: restrito.php');
        }
    }
    else{
        echo "yo";
    }
}else{
    echo "not yo";
}

?>