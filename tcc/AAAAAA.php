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
        $insert = "insert into estado (cd_estado, nm_estado, id_regiao) values (null,'".$_POST['estado']."', '".$_POST['regiao']."')";

        if ($mysqli->query($insert)=== TRUE) {
            echo "<br> Estado gravado com sucesso.";
        }
        else{
            echo ("<br>".$mysqli->error);
            }
    }

        echo "<br>
        <br>
                            <label>Adicionar estado:</label>
                            <input class='form-control' type='text' name='estado' id='estado' placeholder='Digite um estado'><br>
                            <br>
                            <button type='submit' class='btn btn-info'>Enviar</button>
                            <button type='reset' class='btn btn-info'>Limpar</button>
                            
                            <a href="inserir2.php" name="next">INSERIR CIDADES</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>"
?>
</head>