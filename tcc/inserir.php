<?php
include 'conexao.php';
include 'header.php';
if (!isset($_SESSION)) session_start();

  $nivel_necessario = 2;
  if (!isset($_SESSION['usuario']) OR ($_SESSION['nivel'] <$nivel_necessario)) {
      session_destroy();
      header("Location: index.php"); exit;
  }

  $sql = "select * from regiao";
  if ($result = $mysqli->query($sql)) {
        echo "
<body> 
  <div class'container'>
  <div class='row'>
      <div class='col-sm-12'>
        <form method='post'>
                  <div class='panel-body panel-default'>
                      <h3>Adicionar estado</h3>
                          <div class='form-group'>
                              <label for='sel1'>Selecione uma região:</label><br>";

           while($obj = $result->fetch_object()){
            echo "<input type='radio' id='regiao' value='$obj->cd_regiao'> $obj->nm_regiao <br>";
        }
    }

    if (isset($_POST['regiao'])&&isset($_POST['estado'])) {
        $regiao=$_POST['regiao'];
        $estado = $_POST['estado'];
        $insert = "insert into estado (cd_estado, id_regiao, nm_estado) values (null,'".$_POST['regiao']."', '".$_POST['estado']."')";

        if ($mysqli->query($insert)=== TRUE) {
            echo "<br> Estado gravado com sucesso.";
        }
        else{
            echo ("<br>".$mysqli->error);
            }
    }
?>
</head>

<br>
        <br>
                            <label>Adicionar estado:</label>
                            <input class='form-control' type='text' name='estado' id='estado' placeholder='Digite um estado'><br>
                            <br>
                            <button type='submit' class='btn btn-info'>Enviar</button>
                            <button type='reset' class='btn btn-info'>Limpar</button>
                            <a href='inserir2.php' class='btn btn-info'>INSERIR CIDADES</a>
                            <a href='restrito.php' class='btn btn-info'>VOLTAR</a>

                            <?php

                                $show = "select * from estado";

                                echo "<center><h3>Estados já cadastradas</h3></center><br>";

                                if ($query = $mysqli->query($show)) {
                                    while ($dados = $query->fetch_object()) {
                                        echo "<center><table border='1'><tr><th>Código da estado</th> <th>Nome da estado</th> <th>Está em qual regiao</th></tr> <tr><td>" . $dados->cd_estado . "</td>" . "<td>" . $dados->nm_estado . "<td>" . $dados->id_regiao . "</td>" . "<td><button type='button' class='btn btn-success' id='editar'>Editar</button></td>" . "<td><button type='button' class='btn btn-danger' id='excluir' href=''>Excluir</button></td></tr></table></center><br>";
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