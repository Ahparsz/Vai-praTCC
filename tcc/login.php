<title>Login</title>
<body>
<?php
//AQUI É O LOGIN

    include 'conexao.php';
	include 'header.php';

 if (isset($_POST['user'])){
 $user = $_POST['user'];
 $senha = $_POST['senha'];
 $comando = "select * from usuario where user = '".$user."' and senha = '".$senha."' ";
 if($query = $mysqli->query($comando)){

	if($query->num_rows==1){
		while($dados = $query->fetch_object()){
			$_SESSION['usuario'] = $dados->cd_usuario;
			$_SESSION['user'] = $dados->user;
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
<center>
<form method="POST" action="validacao.php">
		<div class="row">
			<div class="col-sm-12" id="meio">
                <label>Username:</label>
				<input type="text" name="user" placeholder="Digite seu username" required>
<br>
				<label>Senha:</label>
				<input type="password" name="senha" placeholder="Digite sua senha" required>
			</div>
		</div>
<br>
<br>
		<div class="row">
			<div class="col-sm-12" id="fim">
				<input type="submit" class="btn btn-light" value="Entrar" id="entrar" name="entrar">
				<a href="cad.php" class="btn btn-dark">Cadastro</a>
		</div>
</form>
	</div>
</center>
</body>

<style>
	body{
		background: #ffe5cc;
		margin-top: 50px;
	}
</style>
</html>