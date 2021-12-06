<title>Vai pra lá</title>
<?php
include 'conexao.php';
include 'css/header.php';
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
    		background-image: url(img/cidades.jpg); 
    		background-size: cover;
    		background-repeat: no-repeat;
    	}
        .scrollspysite{
            position:relative;
            overflow: auto;
            height: 400px;
        }
        #caixas, #caixas-2{
  			border-radius: 10px;
  			padding: 25px;
        }
        #favorito{
            margin-top: 80%;
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
              <form method='post' action='pesquisa.php' class='form-inline my-2 my-lg-0'>
                  <input class='form-control mr-sm-2' type='search' id='pesquisa' name='pesquisa' placeholder='Procure aqui'>
                  <button class='btn btn-outline-warning' type='submit'>Procurar</button>
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
          <form method='post' action='pesquisa.php' class='form-inline my-2 my-lg-0'>
            <input class='form-control mr-sm-2' type='search' id='pesquisa' name='pesquisa' placeholder='Procure aqui'>
            <button class='btn btn-outline-warning' type='submit'>Procurar</button>
          </form>
        </ul>
	    </nav>";
	}
?>
    <br>
    <div class='container-fluid'>
        <br>
        <div class='row'>
            <div class='col-sm-5 offset-md-1 bg-white' id='caixas'>
                <div class="carousel slide" id="carrosel" data-ride="carousel">
                    <ul class="carousel-indicators">
                        <li class="active" data-target='#carrosel' data-slide-to="0" ></li>
                        <li data-target='#carrosel' data-slide-to="1"></li>
                    </ul>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                                <?php
                                    if (isset($_POST['pesquisa'])){
                                      $_SESSION['pesquisa'] = $_POST['pesquisa'];

                                      if($query = $mysqli->query("select * from cidade where cidade.nm_cidade like '%".$_SESSION['pesquisa']."%'")){
                                            while($dados = $query->fetch_object()){
                                            $maps = $dados->maps;
                                            $foto = $dados->cd_cidade;

                                              echo "<img width='500' height='500' src='img/cidade/".$foto.".jpg'>";                                 
                                            }

                                        }
                                    }else {
                                        echo 'aaaaaaaaaa';
                                    }
                                ?>
                        </div>
                        <div class="carousel-item">
                            <?php
                            echo $maps;
                            ?>
                        </div>
                    </div>
                    <a href="#carrosel" class="carousel-control-prev" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a href="#carrosel" class="carousel-control-next" data-slide="next">
                        <span class="carousel-control-next-icon"></span>         
                    </a>
                </div>
            </div>

            <div class='col-sm-4 offset-md-1 bg-white' id='caixas-2'>
                <?php
                    if (isset($_POST['pesquisa'])){
                      $_SESSION['pesquisa'] = $_POST['pesquisa'];

                      if($query = $mysqli->query("select * from cidade where cidade.nm_cidade like '%".$_SESSION['pesquisa']."%'")){
                            while($dados = $query->fetch_object()){
                              echo "<h2 class='text-center'>".$dados->nm_cidade."</h2>";                                 
                            }
                            
                        }
                    }
                ?> 

                <div data-spy="scroll" data-target="#navbar-vertical" data-offset="0" class='scrollspysite'>
                    <?php
                        if (isset($_POST['pesquisa'])){
                            $_SESSION['pesquisa'] = $_POST['pesquisa'];
                            
                            if($query = $mysqli->query("select * from cidade where cidade.nm_cidade like '%".$_SESSION['pesquisa']."%'")){
                                while($dados = $query->fetch_object()){
                                    $_SESSION['cd_cidade'] = $dados->cd_cidade;
                                    $info=$dados->info;
                                }
                                echo $info;
                            }
                            $_SESSION['pesquisa'] = null;
                        }
                    ?>
                        <div class='container' id='favorito'>
                            <?php
                                if (isset($_POST['pesquisa'])){
                                    $_SESSION['pesquisa'] = $_POST['pesquisa'];
                                    
                                    if($query = $mysqli->query("select * from cidade where cidade.nm_cidade like '%".$_SESSION['pesquisa']."%'")){
                                        while($dados = $query->fetch_object()){
                                            $_SESSION['cd_cidade'] = $dados->cd_cidade;
                                        }

                                        if (isset($_SESSION['usuario'])){
                                            $fav = false;
                                            if($query2 = $mysqli->query("select * from favorito where id_usuario = ".$_SESSION['usuario'])){
                                                while($data = $query2->fetch_object()){
                                                    if($data->id_cidade == $_SESSION['cd_cidade']){
                                                        $fav = true;
                                                    }
                                                }
                                            }
                                            if($fav){
                                                echo "<b>Favoritado</b>";
                                            }else{
                                                echo "<br><button id='favoritar' value='".$_SESSION['cd_cidade']."' class='btn btn-danger bnt-sm float-left'>FAVORITAR</button>";
                                            }
                                        }
                                    }
                                }
                            ?>  
                        </div>  
                </div>
            </div>
        </div>
        <br>
        <div class='row'>
            <div class='col-sm-8 offset-md-1 bg-white' id='caixas'>
                Aqui vem os marcadores que depois a gente ve isso e quanto a deixar a imagem responsiva isso tbm vemos depois 
                <a href='destino.php' class='btn btn-danger bnt-sm float-left'>VOLTAR</a>
            </div>
        </div>
    </div>
</body>
</html>

<script type="text/javascript">
      $(document).ready(function(){
          $("#favoritar").on("click", function(){
			    var selecionado = $(this);
			    var op_fave = selecionado.val();
              
			    $.ajax({
              url: "botoes.php",
              type: "POST",
              data: 'favoritar='+op_fave,
              dataType: "html"

              }).done(function(resposta) {
                  $('#caixas-2').html(resposta);
				
              }).fail(function(jqXHR, textStatus ) {
                  console.log("Request failed: " + textStatus);

              }).always(function() {
                  console.log("completou");
              });				
          });
      });
</script>

<script>
      let map;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -33.897, lng: 250.644 },
    zoom: 8,
  });
}
</script>