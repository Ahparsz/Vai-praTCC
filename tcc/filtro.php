<?php
//AQUI É O TESTE DO FILTRO

include 'conexao.php';
include 'header.php';

if (isset($_SESSION['usuario'])) {
  $usuario = $_SESSION['usuario'];

	if(isset($_POST['filtro'])){
		$filtro = $_POST['filtro'];  
   		$sql = "select * from roteiro where email = '".$email."' and senha = '".$senha."' ";
  
		if(!$mysqli->query($sql)){
		echo $mysqli->error;
		}
	}
}
?>

<title>FILTRO TESTER</title>
<body>
	<center>
<form method="post" action="filtro.php">
	<label><h4>Forma de pagamento:</h4></label><br>
		<input type="radio" name="pag" value="1"><label> Crédito</label><br>
		<input type="radio" name="pag" value="2"><label> Débito</label><br>
		<input type="radio" name="pag" value="3"><label> Carnê</label><br>
		<input type="radio" name="pag" value="4"><label> Cheque</label><br>
		<input type="radio" name="pag" value="5"><label> Boleto</label>
</form>
	</center>
</body>
<style>
	body{
		margin-top: 50px;
	}
</style>
</html>