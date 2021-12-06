<?php
include 'conexao.php';
if (isset($_SESSION['usuario'])){
	$usuario = $_SESSION['usuario'];
}

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
                                    $_SESSION['cd_cidade'] = $dados->cd_cidade;
                                    $nm_cidade = $dados->nm_cidade;
                                    $info=$dados->info;
                                    }   	
                            }

                            echo "<h2 class='text-center'>".$nm_cidade."</h2>
                            <div data-spy='scroll' data-target='#navbar-vertical' data-offset='0' class='scrollspysite'>"
                              .$info."
                              <div class='container' id='favorito'>  
                              <br><b>Favoritado</b>
                            </div>"; 
                        }
        }
}


//QUANDO APERTAR NO VISUALIZAR CIDADES
if(isset($_POST['escolhas'])) {
    $escolhas = $_POST['escolhas'];


    if ($escolhas == 1) {
        $cidades="";
        $getcidades = "SELECT * FROM cidade";
                if($query = $mysqli->query($getcidades)){
                    if($query->num_rows>0){
                        echo "<thead>
                        <tr>
                            <th scope='col'>Código</th>
                            <th scope='col'>Código do estado</th>
                            <th scope='col'>Nome</th>
                            <th scope='col'>Informações</th>
                        </tr>
                        </thead>";

                        while($dados = $query->fetch_object()){

                            $cidades.="
                            <tbody>
                                <tr>
                                    <th scope='row'>".$dados->cd_cidade."</th>
                                    <td>".$dados->id_estado."</td> 
                                    <td>".$dados->nm_cidade."</td>
                                    <td>".$dados->info."</td>
                                    <td><button class='btn btn-outline-info float-right'>Alterar</button><a href=excluir.php?codigo_cidade=$dados->cd_cidade class='btn btn-outline-danger float-right mr-1' type='button'>Excluir</button></td>
                                </tr>
                            </tbody>";
                        }
                    }  
                    echo $cidades;
                }
    }

    if ($escolhas == 2) {
        $estados="";
        $getestados = "SELECT * FROM estado";
                if($query = $mysqli->query($getestados)){
                    if($query->num_rows>0){
                        echo "<thead>
                        <tr>
                            <th scope='col'>Código</th>
                            <th scope='col'>Código da região</th>
                            <th scope='col'>Nome</th>
                        </tr>
                        </thead>";

                        while($dados = $query->fetch_object()){

                            $estados.="
                            <tbody>
                                <tr>
                                    <th scope='row'>".$dados->cd_estado."</th>
                                    <td>".$dados->id_regiao."</td> 
                                    <td>".$dados->nm_estado."</td>
                                    <td><button class='btn btn-outline-info float-right'>Alterar</button><a href=excluir.php?codigo_estado=$dados->cd_estado class='btn btn-outline-danger float-right mr-1' type='button'>Excluir</button></td>
                                </tr>
                            </tbody>";
                        }
                    }  
                    echo $estados;
                }
    }
}
?>