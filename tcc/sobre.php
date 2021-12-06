<?php
include 'conexao.php';
include 'css/header.php';
if (!isset($_SESSION)) session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sobre</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

   
   	<style>

      body{
    		background-image: url(img/sobre.jpg); 
    		background-size: cover;
    		background-repeat: no-repeat;
    	}
		#sobre{
			width: 100%;
  			margin-left: auto;
  			margin-right: auto;
  			background-color: #FFF;
  			border-radius: 10px;
  			padding: 25px;
			height: 350px;
		}
		#papa{
			position: relative;
			text-align: center;
			height: 300px;
			margin-left: 50px;
		}
		#caixa{
			width:100%;
			margin-left: auto;
  			margin-right: auto;
  			background-color: #FFF;
  			border-radius: 10px;
  			padding: 25px;
			height: 350px;
		}
		#rodape{
			width: 101%;
			margin: -0% -1%;
			margin-bottom: -1%;
		}

		#email{
			background: url(img/insta.jpg);
		}

		#insta{
			background: url(img/email.jpg);
		}

		#email, #insta{
			width:;
			height:;
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

    <div class="row container-fluid justfy-sm-center">
		<br>
    	<div class="col-sm-6 offset-md-1">
			<br>
			<div id='sobre'>
				<h1>Quem somos:</h1>
				<p>Nossa empresa visa solucionar os problemas de diversos brasileiros que encontram dificuldades na hora de se aventurar por aí!
				Somos uma companhia de viagens que busca proporcionar o melhor destino de viagem para você, com um site especializado e simplificado para facilitar sua vida! Disponibilizamos as melhores pesquisas sobre todo o Brasil, de Norte a Sul, informações e imagens sempre atualizadas e localização em tempo real. 
				Pretendemos ter o maior acesso de empresas possíveis, para proporcionar a melhor experiência com melhor custo benefício para que a sua viagem se torne cada vez mais fácil e prazerosa, provendo memórias incríveis por todo o Brasil!
				Pois você é a nossa prioridade!</p> 
			</div>
    	</div>
    	<div class="col-sm-4">
			<br>
    		<div id='caixa'>
				<img src="img/papa.png" alt="" id=papa>
			</div>
    	</div>
    </div>
		<br>
    <footer>
	    <div class="container-fluid jumbotron jumbotron-fluid bg-white" id='rodape'>
			<div class="row">
				<div class='col-sm-12'>
					<div class='col-sm-6'>
						<div id='insta'></div>
						<div id='email'></div>
					</div>
					<p class="text-center" id="footer"><b> 2021 | Vai pra lá.com | Copyright® by Vai pra lá.com</b></p>
				</div>

			</div>
		</div>
	 	
 	</footer>

</body>
</html>