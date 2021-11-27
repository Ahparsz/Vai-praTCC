<title>Vai pra lá</title>
<?php
if (isset($_SESSION['usuario'])){
	$usuario = $_SESSION['usuario'];
	$user = $_SESSION['user'];

}
include 'conexao.php';
include 'css/header.php';

if (isset($_POST['pesquisa'])){
    $_SESSION['pesquisa'] = $_POST['pesquisa'];

    if($query = $mysqli->query("select * from cidade where cidade.nm_cidade like '%".$_SESSION['pesquisa']."%'")){
        while($dados = $query->fetch_object()){
            echo"
            <br>━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
            <br><h1>".$dados->nm_cidade."</h1>
            <br> ".$dados->info."<br>
            <br><button id='favoritar' class='btn btn-danger'>FAVORITAR</button>
            
            <br>";	
        }
    }

    $_SESSION['pesquisa'] = null;

}else{
    echo "<center>";
    echo "<h1>Nenhum lugar foi achado. Tem certeza?</h1>";
    echo "<br>";
    echo "<a href='index.php'><button class='btn btn-danger'>Voltar</button></a>";
    echo "</center>";      
}
?>
  </body>
</html>















