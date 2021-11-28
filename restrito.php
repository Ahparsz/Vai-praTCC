<?php
include 'conexao.php';
include 'css/header.php';

  // A sessão precisa ser iniciada em cada página diferente
  if (!isset($_SESSION)) session_start();

  $nivel_necessario = 2;

  // Verifica se não há a variável da sessão que identifica o usuário
  if (!isset($_SESSION['usuario']) OR ($_SESSION['nivel'] < $nivel_necessario)) {
    header("Location: index.php"); exit;
  }
      
  //INSERINDO OS ESTADOS
  if (isset($_POST['regiao']) && isset($_POST['estado'])) {
    $regiao=$_POST['regiao'];
    $estado = $_POST['estado'];
    $insert_estado = "insert into estado (cd_estado, id_regiao, nm_estado) values (null,'".$_POST['regiao']."', '".$_POST['estado']."')";
    if (!$mysqli->query($insert_estado)=== TRUE) {
        echo "<br> <b>Estado gravado com sucesso.</b>";
    }
  }
  
?>



  <!DOCTYPE html>
<html lang="en">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restrito</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style >
      .scrollspysite{
          position:relative;
          overflow: auto;
          height: 500px;
      }
    </style>
</head>
<body data-spy="scroll" data-target="#myScrollspy" data-offset="1">
<?php
	//AQUI É O INICIO LOGADO PODE SER O PERFIL
		if (isset($_SESSION['usuario'])){
			$usuario = $_SESSION['usuario'];
			$user = $_SESSION['user'];
		
			echo "<nav class='navbar nav-expand-lg bg-light'>
			<a class='navbar-brand nav-link justify-content-center' href='index.php'>
			 <img src='img/cristo.png' width='100' class='d-inline-block align-center justify-content-center'>
			 Vai Pra lá.com
		   </a>
		   <ul class='nav justify-content-end'>
			   <li class='nav-item'><a href='sobre.php' class='nav-link'>Sobre</a></li>
			   <li class='nav-item'><a href='perfil.php' class='nav-link'>Perfil</a></li>
			</ul>
            
      <ul class='nav justify-content-end'>
        <form method='post' action='pesquisa.php' class='form-inline my-2 my-lg-0'>
          <input class='form-control mr-sm-2' type='search' id='pesquisa' name='pesquisa' placeholder='Procure aqui'>
          <button class='btn btn-outline-warning' type='submit'>Procurar</button>
        </form>
      </ul>
		 </nav>";
		}
?>

    <br>
    <div class='container'>
        <div class='row'>
            <div class='col-sm-3' id="myScrollspy">
                <h4 class='text-center'>Bem-vindo, <?php echo $_SESSION['nome'];?></h4>
                <nav id='navbar-vertical' class='navbar navbar-light bg-light'>
                    <nav class='nav nav-pills flex-column'>
                        <a class='nav-link' href="#item-1">Cadastrar Estado</a>
                        <a class='nav-link' href="#item-2">Cadastrar Cidade</a>
                        <a class='nav-link' href="#item-3">Cadastrar as características</a>
                    </nav>
                </nav>
                <br>
                <a href='logout.php' class='btn btn-danger'>LOGOUT</a>
            </div>
            <div class='col-sm-9 '>
                <div data-spy="scroll" data-target="#navbar-vertical" data-offset="0" class='scrollspysite'>
                    
                <h4 id="item-1">Cadastrar Estado</h4>
                    <form method='post' action='restrito.php'>
                        <div class='form-group'>
                        <b><label id="item-1-1">Selecione uma região</label></b><br>
                              <?php              
                                $sql = "select * from regiao";
                                  if ($result = $mysqli->query($sql)){
                                    while($obj = $result->fetch_object()){
                                      echo "<input type='radio' name='regiao' value='$obj->cd_regiao'> $obj->nm_regiao <br>";
                                    }
                                  }
                              ?>

                          <br>
                          <b><label id="item-1-2">Adicionar estado</label></b><br>
                            <input class='form-control' type='text' name='estado' id='estado' placeholder='Digite um estado'><br>
                            <button type='submit' class='btn btn-dark'>Enviar</button>
                            <button type='reset' class='btn btn-dark'>Limpar</button>
                            <br><br>
                        </div>
                      </form>



                    <h4 id="item-2">Cadastrar Cidade</h4>
                    <form method='post' action='inserir.php' enctype="multipart/form-data">
                      <div class='form-group'>
                        <b><label>Selecione um estado</label></b><br>
                        <select id='estado_option' name='estado'> 
                          <?php
                            $estadosql = "select * from estado order by nm_estado asc";
                
                            if($query = $mysqli->query($estadosql)){
                              if($query->num_rows>0){
	                              while($dados = $query->fetch_object()){
		                              $cd_estado= $dados->cd_estado;
		                              $estado = $dados->nm_estado;
		                              echo "<option class='form-control' id='estado' value='".$cd_estado."'>".$estado."</option><br>";
	                              }
                              }
                            }
                          ?>
                        </select>  
                      </div>
                      
                    <b><label id="item-2-1">Nome da cidade</label></b><br>
                    <input class='form-control' type='text' name='cidade' id='cidade' placeholder='Digite o nome da cidade'><br>

                    <b><label id="item-2-2">Descrição</label></b><br>
                    <input class='form-control' type='text' name='info' id='info' placeholder='Digite as informações da cidade'><br>

                    <b><label id="item-2-3">Coordenadas</label></b><br>
                    <input class='form-control' type="text" name="coordenadas" id='coordenadas' placeholder="Digite as coordenadas"><br>

                    <b><label id="item-2-4">Foto</label></b><br>
                    <input type="file" name="foto" id='foto' placeholder="Adicione uma foto"><br><br>

                    <button type='submit' class='btn btn-dark'>Enviar</button>
                    <button type='reset' class='btn btn-dark'>Limpar</button>
                    </form>
                    <br>
                    <br>


                    <h4 id="item-3">Cadastrar as caracteristicas</h4>
                    <div class='form-group'>
                    <form method='post' action='inserir3.php'> 
                      <b><label>Selecione uma cidade</label></b><br>
                        <select id='cidade_option' name='cidade'> 
                          <?php
                            $cidadesql = "SELECT * from cidade order by nm_cidade asc";
                
                            if($query = $mysqli->query($cidadesql)){
                              if($query->num_rows>0){
	                              while($dados = $query->fetch_object()){
		                              echo "<option id='cidade' value='".$dados->cd_cidade."'>".$dados->nm_cidade."</option><br>";
	                              }
                              }
                            }
                          ?>
                        </select>  
                      </div>
                  <div class='row'>
                  <div class='col-sm-6'>
                    <b><label id="item-3-1">Clima</label></b><br>
                      <?php
                        $climasql = "select * from clima";
                        if ($result = $mysqli->query($climasql)) {
                          while($obj = $result->fetch_object()){
                            echo "<input type='checkbox' name='".$obj->nm_clima."' value='$obj->cd_clima'> $obj->nm_clima <br>";
                          }
                        }
                      ?>

                    <br> 
                    <b><label id="item-3-2">Ambiente</label></b><br>
                    <?php
                      $ambientesql = "select * from ambiente";
                        if ($result = $mysqli->query($ambientesql)) {
                          while($obj = $result->fetch_object()){
                            echo "<input type='checkbox' name='".$obj->nm_ambiente."' value='$obj->cd_ambiente'> $obj->nm_ambiente <br>";
                          }
                        }
                    ?>
                  </div>
                    <br>

                  <div class='col-sm-6'>
                    <b><label id="item-3-3">Categoria</label></b><br>
                    <?php
                      $tiposql = "select * from tipo";
                        if ($result = $mysqli->query($tiposql)) {
                          while($obj = $result->fetch_object()){
                            echo "<input type='checkbox' name='".$obj->nm_tipo."' value='$obj->cd_tipo'> $obj->nm_tipo <br>";
                          }
                        }
                    ?>
                  </div>
                  </div>
                    <br>
                    <button type='submit' class='btn btn-dark'>Enviar</button>
                    <button type='reset' class='btn btn-dark'>Limpar</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
