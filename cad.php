<?php
//AQUI É O CADASTRO

	include 'conexao.php';
	include 'css/header.php';


    if (isset($_POST['nome']) && isset($_POST['user']) && isset($_POST['email']) && isset($_POST['senha'])) {
		$nome = $_POST['nome'];
		$user = $_POST ['user'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

		$insert = "INSERT INTO usuario (cd_usuario, nome, user, email, senha, nivel, ativo, foto) VALUES (null,'".$nome."', '".$user."', '".$email."', '".$senha."', 1, 1, null)";
		if ($mysqli->query($insert)===TRUE){
					header('Location: login.php');
					}
					echo 'erro';
				
	}
?>

<!DOCTYPE html>
<html>
	<meta charset="utf-8">
<head>
	<title>Cadastro</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style type="text/css">
    	*{
    		margin:0;
    		padding:0;
    		box-sizing: border-box;
    		font-family: 'DM Serif Display', serif;
    		border:none;
    		color: #323232;
    		font-size: 20px;
    	}
    	input, label{
    		display: block;
    		outline: none;
    		width: 100%;
    	}
    	a{
    		color: #f95426;
    	}
    	body{
    		padding-top: 5vh;
    		background-image: url(img/fundo.jpg); 
    		background-size: cover;
    		background-position-y:-150px;
    		background-repeat: no-repeat;
    	}
    	h1{
    		text-align: center;
    	}
    	#caixa{
    		width: 600px;
  			margin-left: auto;
  			margin-right: auto;
  			background-color: #FFF;
  			border-radius: 10px;
  			padding: 20px;
    	}
    	#formulario{
    		margin-bottom: 20px;
    		font-size: 1.1rem;
    	}
    	form {
		  	display: flex;
		  	flex-wrap: wrap;
		  	justify-content: space-between;
		}
		.full-box {
		  	flex: 1 1 100%;
		  	position: relative;
		}
		.half-box {
			flex: 1 1 45%;
			position: relative;
		}

		.spacing {
			margin-right: 2.5%;
		}

		#cadastro{
			text-align: center;

		}
    	#adicionar{
      		float: right;
    	}
		label {
			font-weight: bold;
 			font-size: .6rem;
		}
			
		input {
			border-bottom: 2px solid #323232;
			padding: 10px;
			font-size: .7rem;
			margin-bottom: 40px;
		}
			
		input:focus {
			border-color: #f95426;
			}
			
		input[type="submit"] {
			background-color: #;
			color: #FFF;
			border: none;
			border-radius: 20px;
			height: 40px;
			cursor: pointer;
		} 
    </style>
</head>
<body>
	<div id="caixa" class="container">
		<h1>Cadastrar</h1>
		<form id="formulario"  method="POST" action="cad.php">
			<div class="half-box spacing">
        		<label for="name">Nome:</label>
       			<input type="name" name="nome" id="nome" placeholder="Digite seu nome">
      		</div>
      		<div class="half-box">
        		<label for="username">Nome de usuário:</label>
       			<input type="username" name="user" id="user" placeholder="Digite seu nome de usuário">
      		</div>
      		<div class="half-box spacing">
        		<label for="email">E-mail:</label>
       			<input type="email" name="email" id="email" placeholder="Digite seu E-mail">
      		</div>
      		<div class="half-box">
        		<label for="senha">Senha:</label>
       			<input type="password" name="senha" id="senha" placeholder="Digite sua senha">
      		</div>

		<!--não mexer mais aqui-->
          <br>
          <div class="row full-box">
            <div class="col-sm-12" style="text-align: center;">
			  <input type="submit" class="btn btn-danger btn-md" value="Cadastrar">
            </div>
          </div>
		</form>
	</div>
</body>
</html>