<?php
//AQUI É O LOGIN

    include 'conexao.php';
	include 'css/header.php';

 if (isset($_POST['user'])){
 $user = $_POST['user'];
 $senha = $_POST['senha'];
 $comando = "select * from usuario where user = '".$user."' and senha = '".$senha."' ";
 if($query = $mysqli->query($comando)){

	if($query->num_rows==1){
		while($dados = $query->fetch_object()){
			$_SESSION['usuario'] = $dados->cd_usuario;
			$_SESSION['user'] = $dados->user;
			$_SESSION['senha'] = $dados->senha;
			$_SESSION['email'] = $dados->email;
			$_SESSION['nome'] = $dados->nome;
		}
		header('location:validacao.php');
    }else{
    	echo"<br> Dados inválidos, tente de novo.";
    }

 }else{
 	echo $mysqli->error;
 }
}
?>


<!DOCTYPE html>
<html>
	<meta charset="utf-8">
<head>
	<title>Login</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
    	}
    	h1{
    		text-align: center;
    	}
    	#caixa{
    		width: 500px;
  			margin-left: auto;
  			margin-right: auto;
  			background-color: #FFF;
  			border-radius: 10px;
  			padding: 25px;
    	}
    	#formulario{
    		margin-bottom: 25px;
    		font-size: 1.9rem;
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
		label {
			font-weight: bold;
 			font-size: .8rem;
		}
			
		input {
			border-bottom: 2px solid #323232;
			padding: 10px;
			font-size: .9rem;
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
		<h1>Login</h1>
		<form id="formulario" method="POST" action="validacao.php">
			<div class="full-box">
        		<label for="username">Nome de usuário:</label>
       			<input type="username" name="user" id="user" placeholder="Digite seu nome de usuário">
      		</div>
      		<div class="full-box">
        		<label for="senha">Senha:</label>
       			<input type="password" name="senha" id="senha" placeholder="Digite sua senha">
      		</div>
      		<input type="submit" class="btn btn-dark" value="Entrar">
      		<a type="button" href="cad.php" class="btn btn-danger btn-sm">Cadastro</a>
		</form>
	</div>

</body>
</html>