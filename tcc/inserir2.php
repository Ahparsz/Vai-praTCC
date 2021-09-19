<?php
include 'conexao.php';
include 'header.php';
if (!isset($_SESSION)) session_start();

  $nivel_necessario = 2;
  if (!isset($_SESSION['usuario']) OR ($_SESSION['nivel'] <$nivel_necessario)) {
      session_destroy();
      header("Location: index.php"); exit;
  }

    $sql3 = "select * from estado";

    if ($result = $mysqli->query($sql3)) {
        echo "<form method='post'>
            <fieldset>
            <legend><h1>Registro</h1></legend>
            <label><b>Estado que deseja cadastrar: </b></label><br>";

        while($obj = $result->fetch_object()){
            echo "<input type='radio' name='estado' value='$obj->cd_estado'> $obj->nm_estado <br><br>";
        }
    }

    if (isset($_POST['estado'])&&isset($_POST['cidade'])) {
        $cidade=$_POST['estado'];
        $cidade = $_POST['cidade'];
        $insert = "insert into cidade (cd_cidade, nm_cidade, id_estado) values (null,'".$_POST['cidade']."', '".$_POST['estado']."')";

        if ($mysqli->query($insert)=== TRUE) {
            echo "<br> Cidade gravada com sucesso.";
        }
        else{
            echo ("<br>".$mysqli->error);
            }
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <title>Banco com Insert</title>
</head>
<body>
    <div class="container"> 
    <br><label><b>Cidade: </b></label><br>
    <input type="text" name="cidade" placeholder="Digite uma cidade"><br>
    </fieldset>
    <br>
        
    <input type="submit" value="Gravar"> 
    <input type="reset" name="Limpar">
    <a href="index.php" name="voltar">VOLTAR</a>
    </form>
    <br><br>

    <?php
        $show = "select * from cidade";

        echo "<center><h3>Cidades já cadastradas</h3></center><br>";

        if ($query = $mysqli->query($show)) {
            while ($dados = $query->fetch_object()) {
                echo "<center><table border='3'><tr><th>Código da cidade</th> <th>Nome da cidade</th> <th>Está em qual estado</th></tr> <tr><td>" . $dados->cd_cidade . "</td>" . "<td>" . $dados->nm_cidade . "<td>" . $dados->id_estado . "</td></tr></table></center><br>";
            }
        }
    ?>
    </div> 
</body>
</html>