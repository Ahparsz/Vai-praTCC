<?php
//AQUI É O INICIO

include 'conexao.php';
include 'css/header.php';
if (!isset($_SESSION)) session_start();
?>

<html>
<meta charset="utf-8">
  <head>
    <title>Vai pra lá.com</title>
    <!-- Required meta tags -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style type="text/css">
      #regiao{
        width:150px;
        height:150px;
        float:left;
        margin-left:20px;
        text-align:center;
        line-height: 150px;
        font-size:20px;
        border-radius:50%;
        background-color:#3d00a9;
        transition:all 0.4s ease-out;
      }
      #regiao:hover{
        cursor:pointer;
        transform:translateY(-20px);
        box-shadow: 4px 30px 16px 2px #888;
      }
      .carousel-inner img{
        width:100%; 
        position: relative;
        margin: auto;
      }
      .carousel-indicators{
        bottom:auto;
        position: absolute;
        left:60%;
        top:90%;
      }
      .carousel-caption{
        top: 30%;
        bottom: auto;
        position: absolute;
        left: 70%;
        border-radius: 10px;
        margin: 0px;
        width: 20%;
      }
      #buttonca{
        background: none;
        border:0;
        position: relative;
        transition: all 500ms ease-in-out;
      }
      #buttonca:after{
        content:'';
        transition: inherit; 
        width: 40px;
        height: 40px;
        border-radius:50%;
        background-color:#fd096b;
        position: absolute;
        top:-28%;
        left:-10px;
        opacity: 0.3;
        z-index:-1;
      }
      #buttonca:hover:after{
        width: calc(100% + 20px);
        border-radius: 20px;
        opacity: 0.6;

      }
      #botao-card{
        float:right;
      }
      @media (max-width: 1024px){
        .carousel-inner {
          width: 100%; 
          position: relative;
        }
      }

    </style>
  </head>
  <body>

<!--AQUI É A NAVBAR-->
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
	
<!--AQUI É O CARROSSEL-->
      <div class="carousel slide" id="carrosel" data-ride="carousel">
				<ul class="carousel-indicators">
					<li class="active" data-target='#carrosel' data-slide-to="0" ></li>
					<li data-target='#carrosel' data-slide-to="1"></li>
					<li data-target='#carrosel' data-target-to="2"></li>
          <li data-target='#carrosel' data-target-to="3"></li>
          <li data-target='#carrosel' data-target-to="4"></li>
          <li data-target='#carrosel' data-target-to="5"></li>
				</ul>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="img/banner inicial.jpg">
						<div class="carousel-caption bg-white">
            <h3 class="text-capitalize font-weight-bold text-dark">Vai Pra Lá.com</h3>
              <p class="text-capitalize font-weight-bold text-dark">Seu site de viagens preferido!</p>
						</div>
					</div>
					<div class="carousel-item">
						<img src="img/banner centro.png">
						<div class="carousel-caption bg-white">
            <h3 class="text-capitalize text-dark">Foz do Iguaçu:</h3>
            <p class="text-capitalize text-dark">Conheça as quedas d'águas mais apaixonantes da região Sul</p>
            <a type="button" id='buttonca' class='text-dark'>Saiba Mais</a>
						</div>
					</div>
					<div class="carousel-item">
						<img src="img/banner nordeste.png">
						<div class="carousel-caption bg-white">
            <h3 class="text-capitalize text-dark">Foz do Iguaçu:</h3>
            <p class="text-capitalize text-dark">Conheça as quedas d'águas mais apaixonantes da região Sul</p>
            <a type="button" id='buttonca' class='text-dark'>Saiba Mais</a>
						</div>
					</div>
          <div class="carousel-item">
            <img src="img/banner sudeste.png">
            <div class="carousel-caption bg-white">
            <h3 class="text-capitalize text-dark">Foz do Iguaçu:</h3>
            <p class="text-capitalize text-dark">Conheça as quedas d'águas mais apaixonantes da região Sul</p>
            <a type="button" id='buttonca' class='text-dark'>Saiba Mais</a>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/banner norte.png">
            <div class="carousel-caption bg-white">
            <h3 class="text-capitalize text-dark">Foz do Iguaçu:</h3>
            <p class="text-capitalize text-dark">Conheça as quedas d'águas mais apaixonantes da região Sul</p>
            <a type="button" id='buttonca' class='text-dark'>Saiba Mais</a>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/banner sul.png">
            <div class="carousel-caption bg-white">
              <h3 class="text-capitalize text-dark">Foz do Iguaçu:</h3>
              <p class="text-capitalize text-dark">Conheça as quedas d'águas mais apaixonantes da região Sul</p>
              <a type="button" id='buttonca' class='text-dark'>Saiba Mais</a>
            </div>
          </div>
				</div>
				<a href="#carrosel" class="carousel-control-prev" data-slide="prev">
					<span class="carousel-control-prev-icon"></span>
				</a>
				<a href="#carrosel" class="carousel-control-next" data-slide="next">
					<span class="carousel-control-next-icon"></span>
				</a>
			</div>
      <br>
      <br>
  
<!--AQUI É AS BOLOTAS-->
    <div class='jumbotron jumbotron-fluid'>
      <h1 class="text-sm-center">Escolha a região de seu futuro destino:</h1>
      <br>
      <div class="container">
        <form method='post' action='destino.php'>
          <div class="row">
              <?php
			          //BOTOES DAS REGIOES
			        $getregiao = "SELECT * FROM regiao";
			          if($query = $mysqli->query($getregiao)){
				          if($query->num_rows>0){
					            while($dados = $query->fetch_object()){
						            $_SESSION['cd_regiao'] = $dados->cd_regiao;
						            $nm_regiao = $dados->nm_regiao;

						            echo "
                        <center>
                          <div class='col-sm-2'>
                            <button type='submit' id='regiao' name='regiao' class='text-warning' value='".$_SESSION['cd_regiao']."'>".$nm_regiao."</button>
                          </div>
                        </center>";
					            }
				          }
			          }else{
				          echo'erro';
			          }
			          ?>
          </div>
        </form>
      </div>
    </div>
<br>
<!--AQUI SÃO OS CARDS-->
  <div class="row">
    <div class="col-sm-4">
      <div class="card"> 
          <img class="img-fluid" src="img/mala2.jpg" width="100%">
        <div class="card-body">
          <h4 class="card-title text-capitalize text-center">O que levar para viajar?</h4>
          <p class='text-center'>Saiba como fazer suas malas para curtir sua viagem!</p>
          <button type="button" class="btn btn-outline-info btn-block" data-toggle="modal" data-target="#primeiroModal" id="botao-card">Ler</button>
          <div class="modal fade" id="primeiroModal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                      <h4 class="modal-title">Título</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      Antes de começar a organizar sua mala, não esqueça de conferir o clima da cidade que irá visitar, se for quente procure escolher só roupas leves e frescas e se for frio roupas mais pesadas e compridas. Para aproveitar bem o espaço de sua mala, enrole as roupas como um cilindro, coloque os produtos de higiene em sacolas para evitar perdê-los e se estiver levando aparelhos eletrônicos como um notebook, guarde-o entre as roupas para protegê-lo.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                     </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="col-sm-4">
      <div class="card"> 
          <img class="img-fluid" src="img/viajar.jpg" width="100%">
        <div class="card-body">
          <h4 class="card-title text-capitalize text-center">Passagens viagens e muito mais!</h4>
          <p class='text-center'>Afinal, o que fazer antes de viajar?</p>
          <button type="button" class="btn btn-outline-info btn-block" data-toggle="modal" data-target="#primeiroModal" id='botao-card'>Ler</button>
          <div class="modal fade" id="primeiroModal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                      <h4 class="modal-title">Título</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      Lembre-se de sempre consultar suas fontes antes de comprar o bilhete da sua viagem, primeiro, procure uma companhia aérea ou rodoviária de confiança caso seu destino seja muito distante. Caso a viagem seja de carro ou outro veículo, lembre-se sempre de se abastecer o motor antes de partir, aperte os cintos e tenha atenção na estrada!
                      Em terminais ou aeroportos, mantenha-se atento ao horário de partida e aos nomes mostrados em placas, senão é perigoso ir no lugar errado! Afinal, viajar deve ser algo divertido!

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                     </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <br>
    <div class="col-sm-4">
      <div class="card"> 
          <img class="img-fluid" src="img/seila.jpg">
        <div class="card-body">
          <h4 class="card-title text-capitalize text-center">O destino e suas cidades!</h4>
          <p class='text-center'>Para aproveitar ao máximo sua viagem!</p>
          <button type="button" class="btn btn-outline-info btn-block" data-toggle="modal" data-target="#primeiroModal" id='botao-card'>Ler</button>
          <div class="modal fade" id="primeiroModal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                      <h4 class="modal-title">Título</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                    Ao chegar ao seu destino, aproveite mas com consciência! Respeite as leis do local e procure ter respeito com os moradores locais, afinal, eles estarão te acolhendo na cidade deles. Procure locais importantes, como hospitais, restaurantes e delegacias antecipadamente para caso de uma emergência. Mas, acima de tudo, aproveite esse momento para você e tenha uma ótima viagem!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                     </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <br>
  </div>
  <br>

  <div class="row">
    <div class="container-fluid jumbotron jumbotron-fluid">
      <footer>
          <p class="text-center" id="footer"><b> 2021 | Vai pra lá.com | Copyright® by Vai pra lá.com</b></p>
      </footer>
    </div>    
  </div>
  </body>
</html>