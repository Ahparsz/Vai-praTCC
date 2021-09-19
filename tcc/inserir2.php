<?php
include 'conexao.php';
include 'header.php';
if (!isset($_SESSION)) session_start();

  $nivel_necessario = 2;
  if (!isset($_SESSION['usuario']) OR ($_SESSION['nivel'] <$nivel_necessario)) {
      session_destroy();
      header("Location: index.php"); exit;
  }

    $estadosql = "select * from estado";

    if ($result = $mysqli->query($estadosql)) {
        echo "<form method='post'>
            <fieldset>
            <legend><h1>Registro</h1></legend>
            <label><b>Estado que deseja cadastrar: </b></label><br>";

        while($obj = $result->fetch_object()){
            echo "<input type='radio' name='estado' value='$obj->cd_estado'> $obj->nm_estado <br>";
        }
    }

    $climasql = "select * from clima";

    if ($result = $mysqli->query($climasql)) {
        echo "
            <br><br><label><b>Clima da cidade: </b></label><br>";

        while($obj = $result->fetch_object()){
            echo "<input type='radio' name='clima' value='$obj->cd_clima'> $obj->nm_clima <br>";
        }
    } 

    $tiposql = "select * from tipo";

    if ($result = $mysqli->query($tiposql)) {
        echo "
        <br><br><label><b>Característica da cidade: </b></label><br>";

        while($obj = $result->fetch_object()){
            echo "<input type='radio' name='tipo' value='$obj->cd_tipo'> $obj->nm_tipo <br>";
        }
    } 

    $ambientesql = "select * from ambiente";

    if ($result = $mysqli->query($ambientesql)) {
        echo "
        <br><br><label><b>Ambiente da cidade: </b></label><br>";

        while($obj = $result->fetch_object()){
            echo "<input type='radio' name='ambiente' value='$obj->cd_ambiente'> $obj->nm_ambiente <br>";
        }
    } 

    echo "<br><br><label><b>Informações da cidade: </b></label><br>
    <input type='text' name='info' placeholder='Digite as informações da cidade' <br>";



    if (isset($_POST['estado'])&&isset($_POST['cidade'])&&isset($_POST['clima'])&&isset($_POST['tipo'])&&isset($_POST['ambiente'])&&isset($_POST['info'])&&isset($_FILE['foto'])) {
        $estado =$_POST['estado'];
        $cidade = $_POST['cidade'];
        $clima= $_POST['clima'];
        $tipo= $_POST['tipo'];
        $ambiente= $_POST['ambiente'];
        $info=$_POST['info'];
        $foto=$_FILE['foto'];

        if (!empty($foto["name"])) {
            $largura = 150;
            $altura = 180;
            $tamanho = 1000;
            $error = array();
    
            if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
                $error[1] = "Isso não é uma imagem.";
            } 
    
            $dimensoes = getimagesize($foto["tmp_name"]);
    
            if($dimensoes[0] > $largura) {
                $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
            }
    
            if($dimensoes[1] > $altura) {
                $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
            }
            
            if($foto["size"] > $tamanho) {
                    $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
            }
            
            if (count($error) == 0) {
                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
                $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
                $caminho_imagem = "IMG/" . $nome_imagem;
                move_uploaded_file($foto["tmp_name"], $caminho_imagem);
    
                $insert = "insert into cidade (cd_cidade, id_estado, nm_cidade, id_clima, id_tipo, id_ambiente, info) values (null,'".$_POST['estado']."', '".$_POST['cidade']."', '".$_POST['clima']."', '".$_POST['tipo']."', '".$_POST['ambiente']."', '".$_POST['info']."', '".$caminho_imagem."')";
                        if ($mysqli->query($insert)=== TRUE) {
                            echo "<br> Cidade gravada com sucesso.";
                        }
                        else{
                            echo ("<br>".$mysqli->error);
                        }
            }
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
    <br><br><label><b>Cidade: </b></label><br>
    <input type="text" name="cidade" placeholder="Digite uma cidade"><br>
    <br>

    <br><br><label><b>Foto da cidade: </b></label><br>
    <input type="file" name="foto"><br>
    <br>
        
    <button type='submit' class='btn btn-info'>Enviar</button>
    <button type='reset' class='btn btn-info'>Limpar</button>
    <a href='inserir.php' class='btn btn-info'>VOLTAR</a>
    <a href='restrito.php' class='btn btn-info'>INICIO</a>
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

    <style>
    body{
        margin-left: 20px;
        margin-top: 20px;
    }
</style>
</body>
</html>