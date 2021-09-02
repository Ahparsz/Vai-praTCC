<?php
//AQUI É O INICIO

include 'conexao.php';
include 'header.php';
if (isset($_SESSION['usuario'])) {
  $usuario = $_SESSION['usuario'];
}
?>

<title>Vai pra lá!</title>
<body>
	<center>
		<h1>VAI PRA LÁ.COM</h1>
		<h2>Site dos viajantes</h2>
		<br><img src="img/placa.png" alt="Placa dos surtos" height="300px" width="270px">
		<br>
		<br><a href="login.php" class="btn btn-dark">LOGIN</a>
		<a href="filtro.php" class="btn btn-dark">AINDA EM PROCESSO...</a>

	</center>
</body>
<style>
	body{
		margin-top: 50px;
	}
</style>
</html>