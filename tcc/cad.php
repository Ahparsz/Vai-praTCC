<?php
//AQUI É O CADASTRO

	include 'conexao.php';
	include 'header.php';

    if (isset($_POST['nome'])&&isset($_POST['email'])&&isset($_POST['senha'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $insert = "insert into usuario (cd_usuario, nome, email, senha) values (null,'".$_POST['nome']."', '".$_POST['email']."', '".$_POST['senha']."')";

        if ($mysqli->query($insert)=== TRUE) {
            header('location:index.php');
        }
        else{
            echo ("<br> Deu erro");
            }
    }
?>
<title>Cadastro</title>
<body>
<center>
<br>
<form method="POST" action="cad.php">
		<div class="row">
			<div class="col-sm-12" id="meio">
                <label>Nome:</label>
				<input type="text" name="nome" placeholder="Digite seu nome" required>
<br>

                <label>Email:</label>
				<input type="text" name="email" placeholder="Digite seu email" required>
<br>
				<label>Senha:</label>
				<input type="password" name="senha" placeholder="Digite sua senha" required>
			</div>
		</div>
<br>
<br>
		<div class="row">
			<div class="col-sm-12" id="fim">
				<input type="submit" class="btn btn-dark" value="Cadastrar">
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