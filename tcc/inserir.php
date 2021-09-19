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
          echo "<form method='post'>
              <fieldset>
              <legend><h1>Registro</h1></legend>
              <label><b>Região que deseja cadastrar: </b></label><br>";
  
             while($obj = $result->fetch_object()){
              echo "<input type='radio' name='regiao' value='$obj->cd_regiao'> $obj->nm_regiao <br><br>";
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
  ?>
      <title>INSERÇÃO</title>
  <body>	
    <container>
      <br><label><b>Estado: </b></label><br>
      <input type="text" name="estado" placeholder="Digite um estado"><br>
      </fieldset>
      <br>
          
      <input type="submit" value="Gravar"> 
      <input type="reset" name="Limpar">
      <a href="inserir2.php" name="next">INSERIR CIDADES</a>
      </form>
      <br><br>
  
      <?php
          $show = "select * from estado";
  
          echo "<center><h3>Estados já cadastrados</h3></center><br>";
  
          if ($query = $mysqli->query($show)) {
              while ($dados = $query->fetch_object()) {
                  echo "<center><table border='3'><tr><th>Código ddo estado</th> <th>Nome do estado</th> <th>Está em qual região</th></tr> <tr><td>" . $dados->cd_estado . "</td>" . "<td>" . $dados->nm_estado . "<td>" . $dados->id_regiao . "</td></tr></table></center><br>";
              }
          }
      ?>
  </body>
        </container>
  </html>