<?php
//AQUI É O INICIO LOGADO PODE SER O PERFIL

include 'conexao.php';
include 'header.php';

if (isset($_SESSION['usuario'])){
	$usuario = $_SESSION['usuario'];
	$user = $_SESSION['user'];

}
?>

<title>Vai pra lá!</title>
<body>
	<center>
		<h1>VAI PRA LÁ.COM </h1>
		<h2>Site dos viajantes LOGADOS NESSE CACETE</h2>
		<p>Olá, <?php echo $_SESSION['user'];?>! Seus dados são:</p><br>
		<br>
		<br>
		<br><img src="img/bob.png" alt="Placa dos surtos" height="500px" width="500px">
		<br>
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