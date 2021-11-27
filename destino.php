<?php
//AQUI É O INICIO

include 'conexao.php';
include 'css/header.php';
if (!isset($_SESSION)) session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <style>
        body{
    		background-image: url(img/sobre.jpg); 
    		background-size: cover;
    		background-repeat: no-repeat;
    	}
        .scrollspysite{
            position:relative;
            overflow: auto;
            height: 400px;
        }
        #regiao{
            width: 90px;
            height:90px;
            float:left;
            margin-left:20px;
            text-align:center;
            font-size:20px;
            border-radius:50%;
            background-color:#fd096b;
            transition:all 0.4s ease-out;
        }
        #regiao:hover{
            cursor:pointer;
            transform:translateY(-20px);
            box-shadow: 4px 30px 16px 2px #888;
        }
        #caixas{
  			background-color: #FFF;
  			border-radius: 10px;
  			padding: 25px;
        }
        *{
		    font-family: 'DM Serif Display', serif;
		}
        a{
		    color:#f95426;	
		} 
    </style>
</head>
<body>
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
                <form method='post' action='pesquisa.php'>
                    <input type='search' id='pesquisa' name='pesquisa' placeholder='Procure aqui'>
                    <button class='btn btn-success' type='submit'>Procurar</button>
                </form>
            </ul>
		 </nav>";
		}
?>

<?php
	//AQUI É O NÃO LOGADO
	if (!isset($_SESSION['usuario'])){
		echo "<nav class='navbar nav-expand-lg bg-light'>
		<a class='navbar-brand nav-link justify-content-center' href='index.php'>
		 <img src='img/cristo.png' width='100' class='d-inline-block align-center justify-content-center'>
		 Vai Pra lá.com
	   </a>
       <ul class='nav justify-content-end'>
       <li class='nav-item'><a href='sobre.php' class='nav-link'>Sobre</a></li>
       <li class='nav-item'><a href='login.php' class='nav-link'>Entrar</a></li>
    </ul>
    
    <ul class='nav justify-content-end'>
        <form method='post' action='pesquisa.php'>
            <input type='search' id='pesquisa' name='pesquisa' placeholder='Procure aqui'>
            <button class='btn btn-success' type='submit'>Procurar</button>
        </form>
    </ul>
	 </nav>";
	}
?>
    <br>

    <div class='container-fluid'>
        <div class='row'>
            <div class='col-sm-10 offset-md-1 bg-white' id='caixas'>
                    <?php
                        if(isset($_POST['regiao'])) {
                            $regiao = $_POST['regiao'];

                            $sql = "SELECT * FROM regiao WHERE regiao.cd_regiao =".$regiao;
                                if($query = $mysqli->query($sql)){
                                    if($query->num_rows>0){
                                        while($dados = $query->fetch_object()){
                                            $_SESSION['cd_regiao'] = $dados->cd_regiao;
                                            $nm_regiao = $dados->nm_regiao;			
                                            $info = $dados->info;		
                                        }
                                        echo "<h4>".$nm_regiao."</h4>
                                        <p class='text-justify'>".$info."</p>";
                                    }
                                }
                        }
                    ?>
            </div>
        </div>

        <div class='row'>
            <div class='col-12 bg-white' id='caixas'>
                <center>
                    <h3>Mudando de direção</h3>
                        <form method='post' action='destino.php'>
                            <?php
			                          //BOTOES DAS REGIOES
			                        $getregiao = "SELECT * FROM regiao";
			                          if($query = $mysqli->query($getregiao)){
			                	          if($query->num_rows>0){
			                		            while($dados = $query->fetch_object()){
			                			            $cd_regiao = $dados->cd_regiao;
			                			            $nm_regiao = $dados->nm_regiao;
                                                
			                			            echo "<center>
                                                    <div class='col-sm-6'>
                                                      <button type='submit' id='regiao' name='regiao' class='text-warning' value='".$cd_regiao."'>".$nm_regiao."</button>
                                                    </div>
                                                  </center>";
			                		            }
			                	          }
			                          }else{
			                	          echo'erro';
			                          }
			                ?>
                        </form>
                </center>
            </div>
        </div>

        <div class='row'>
        <div class='col-sm-10 offset-md-1 bg-white' id='caixas'>
            <center>
            <div class=''>
                <div class='card-body'>
                <h3 class='card-title'>Estados</h3>
                <select id='estado' class='form-control'>
                <?php
                    $sql = "SELECT * FROM estado WHERE estado.id_regiao =".$_SESSION['cd_regiao'];
                    $estados='';
                        if($query = $mysqli->query($sql)){
                            if($query->num_rows>0){
                                while($dados = $query->fetch_object()){
                                    $_SESSION['cd_estado'] = $dados->cd_estado;
                                    $nm_estado = $dados->nm_estado;
					                $estados.="<option value=".$_SESSION['cd_estado'].">".$dados->nm_estado."</option>";;
                                }
                                echo $estados;
                            }
                        }
                ?>
                </select>
                </div>
            </div>
            </center>
        </div>
        </div>

        <br>
        <div class='row'>
            <div class='col-sm-3 offset-md-1 bg-white' id='caixas'>
                <div data-spy="scroll" data-target="#navbar-vertical" data-offset="0" class='scrollspysite'>
                    <div id="filtro">
						<?php
						$climasql = "select * from clima";
						if ($result = $mysqli->query($climasql)) {
							echo "<br>
							<label>
							<b>Clima da cidade:</b>
							</label><br>";

							while($obj = $result->fetch_object()){
								echo "<input type='checkbox' id='clima' name='clima' value='$obj->cd_clima'> $obj->nm_clima <br>";
							}
						}

                        $ambientesql = "select * from ambiente";
						if ($result = $mysqli->query($ambientesql)) {
							echo "<br><label><b>Ambiente da cidade: </b></label><br>";
							while($obj = $result->fetch_object()){
								echo "<input type='checkbox' id='ambiente' name='ambiente' value='$obj->cd_ambiente'> $obj->nm_ambiente <br>";
							}
						} 
					
						$tiposql = "select * from tipo";
						if ($result = $mysqli->query($tiposql)) {
							echo "<br><label><b>Característica da cidade: </b></label><br>";
							while($obj = $result->fetch_object()){
								echo "<input type='checkbox' id='tipo' name='tipo' value='$obj->cd_tipo'> $obj->nm_tipo <br>";
							}
						} 
					
						?>
					</div>
                </div>  
            </div>
            <div class='col-sm-6 offset-md-1 bg-white' id='caixas'>
                <h2 class='text-center'> Encontre o seu futuro destino:</h2>
                <div data-spy="scroll" id='cidade_local' data-target="#navbar-vertical" data-offset="0" class='scrollspysite'>
                </div>
            </div>
        </div>
        <br>
        <br>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $(".regiao").on("click", function(){
				var selecionado = $(this);
				var op_regiao = selecionado.val();
                
				$.ajax({
                url: "filtro.php",
                type: "POST",
                data: 'regiao='+op_regiao,
                dataType: "html"
 
                }).done(function(resposta) {
                    $('#estado').html(resposta);
					
                }).fail(function(jqXHR, textStatus ) {
                    console.log("Request failed: " + textStatus);
 
                }).always(function() {
                    console.log("completou");
                });
				
            });

			$("#estado").on("change", function(){
				var selecionado = $('#estado option:selected');
				var op_estado = selecionado.val();
                $.ajax({
                url: "filtro.php",
                type: "POST",
                data: 'estado='+op_estado,
                dataType: "html"
 
                }).done(function(resposta) {
                    $('#cidade_local').html(resposta);
 
                }).fail(function(jqXHR, textStatus ) {
                    console.log("Request failed: " + textStatus);
 
                }).always(function() {
                    console.log("completou");
                });
            });

        });
    	</script>
</body>
</html>