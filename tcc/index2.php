<?php
//AQUI É O INICIO LOGADO

include 'conexao.php';
include 'header.php';
if (isset($_SESSION['usuario'])) session_start();
?>

<title>Vai pra lá!</title>
<body>
	<center>
		<h1>VAI PRA LÁ.COM </h1>
		<h2>Site dos viajantes LOGADOS NESSE CACETE</h2>
		<br><img src="img/placa.png" alt="Placa dos surtos" height="300px" width="270px">
		<br>
		<a href="filtro.php" class="btn btn-dark">AINDA EM PROCESSO...</a>
        <a href="logout.php" class="btn btn-danger">LOGOUT</a>

	</center>
</body>
<style>
	body{
		margin-top: 50px;
	}
</style>
</html>