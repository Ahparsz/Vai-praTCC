<?php
include 'conexao.php';
include 'header.php';
if (!isset($_SESSION)) session_start();

  $nivel_necessario = 2;
  if (!isset($_SESSION['usuario']) OR ($_SESSION['nivel'] <$nivel_necessario)) {
      session_destroy();
      header("Location: index.php"); exit;
  }

  $sql = "select * from estado";
  if ($result = $mysqli->query($sql)) {
        echo "
<body> 
  <div class'container'>
  <div class='row'>
      <div class='col-sm-12'>
        <form method='post'>
                  <div class='panel-body panel-default'>
                      <h3>Adicionar cidades</h3>
                          <div class='form-group'>
                              <label for='sel1'>Selecione um estado:</label><br>";

           while($obj = $result->fetch_object()){
            echo "<input type='radio' id='estado' value='$obj->cd_estado'> $obj->nm_estado <br>";
        }
    }


    $climasql = "select * from clima";
    if ($result = $mysqli->query($climasql)) {
        echo "
            <br><br><label for='sel1'><b>Clima da cidade: </b></label><br>";

        while($obj = $result->fetch_object()){
            echo "<input type='radio' name='clima' value='$obj->cd_clima'> $obj->nm_clima <br>";
        }
    } 


    $tiposql = "select * from tipo";
    if ($result = $mysqli->query($tiposql)) {
        echo "
        <br><br><label for='sel1'><b>Característica da cidade: </b></label><br>";

        while($obj = $result->fetch_object()){
            echo "<input type='radio' name='tipo' value='$obj->cd_tipo'> $obj->nm_tipo <br>";
        }
    } 


    $ambientesql = "select * from ambiente";
    if ($result = $mysqli->query($ambientesql)) {
        echo "
        <br><br><label for='sel1'><b>Ambiente da cidade: </b></label><br>";

        while($obj = $result->fetch_object()){
            echo "<input type='radio' name='ambiente' value='$obj->cd_ambiente'> $obj->nm_ambiente <br>";
        }
    } 

    echo "<br><br><label for='sel1'><b>Informações da cidade: </b></label><br>
    <input type='text' name='info' height='100px' width='100px' form='regi-cidade' placeholder='Digite as informações da cidade'><br>";



    if (isset($_POST['estado'])&&isset($_POST['cidade'])&&isset($_POST['clima'])&&isset($_POST['tipo'])&&isset($_POST['ambiente'])&&isset($_POST['info'])) {
        $estado =$_POST['estado'];
        $cidade = $_POST['cidade'];
        $clima= $_POST['clima'];
        $tipo= $_POST['tipo'];
        $ambiente= $_POST['ambiente'];
        $info=$_POST['info'];
    
        $insert = "insert into cidade (cd_cidade, id_estado, nm_cidade, id_clima, id_tipo, id_ambiente, info) values (null,'".$_POST['estado']."', '".$_POST['cidade']."', '".$_POST['clima']."', '".$_POST['tipo']."', '".$_POST['ambiente']."', '".$_POST['info']."')";
            if ($mysqli->query($insert)=== TRUE) {
                echo "<br> Cidade gravada com sucesso.";
            }
            else{
                echo ("<br>".$mysqli->error);
            }
    }
?>
</head>
<title>Banco com Insert</title>
<meta charset="utf-8">
<br>
        <br>
                            <label>Nome da cidade:</label>
                            <input class='form-control' type='text' name='cidade' id='cidade' placeholder='Digite uma cidade'><br>
                            <br>
                            <button type='submit' class='btn btn-info'>Enviar</button>
                            <button type='reset' class='btn btn-info'>Limpar</button>
                            <a href='inserir.php' class='btn btn-dark'>VOLTAR</a>
                            <a href='restrito.php' class='btn btn-dark'>INICIO</a>
                            <br><br>

                            <?php
                                $show = "select * from cidade";
                                echo "<center><h3>Cidades já cadastradas</h3></center><br>";

                                if ($query = $mysqli->query($show)) {
                                    while ($dados = $query->fetch_object()) {
                                        echo "<center><table border='3'><tr><th>Código da cidade</th> <th>Nome da cidade</th> <th>Está em qual estado</th> <th> da cidade</th> <th>Clima da cidade</th> <th>Tipo da cidade</th></tr> <tr><td>" . $dados->cd_cidade . "</td>" . "<td>" . $dados->nm_cidade . "</td>" . "<td>" . $dados->id_estado . "</td>" . "<td>" . $dados->id_clima . "</td>" . "<td>" . $dados->id_ambiente . "</td>" . "<td>" . $dados->id_tipo . "</td></tr></table></center><br>";
                                    }
                                }
                            ?> 
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<style>
    body{
        margin-left: 20px;
        margin-top: 20px;
    }
</style>