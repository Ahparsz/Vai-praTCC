<?php
include 'conexao.php';

//AQUI QUANDO APERTAR EM FAVORITAR
if(isset($_POST['favoritar'])) {
    $favoritar = $_POST['favoritar'];

    $insert = "INSERT INTO favorito (id_cidade, id_usuario) VALUES ('".$_SESSION['cd_cidade']."', '".$_SESSION['usuario']."')";
        if ($mysqli->query($insert)=== TRUE){
            $sql = "SELECT * FROM cidade, favorito WHERE cidade.cd_cidade =".$_SESSION['cd_cidade'];
                    $cidade='';
                        if($query = $mysqli->query($sql)){
                            if($query->num_rows>0){
                                while($dados = $query->fetch_object()){
                                    $cidade = "
                                        <br>━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
                                        <br><img src='/img/cidade/".$dados->cd_cidade.".jpg'>
                                        <br><h1>".$dados->nm_cidade."</h1>
                                        <br> ".$dados->info."<br>
                                        <br><b>Favoritado</b>
                                                            
                                        <br>";
                                }
                                echo $cidade;
                            }
                        }
        }
}

?>