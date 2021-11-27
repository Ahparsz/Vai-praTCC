<title>Vai pra lá</title>
<?php
include 'conexao.php';
include 'css/header.php';
?>

<?php
	//AQUI É O NÃO LOGADO
	if (!isset($_SESSION['usuario'])){
		header('login.php');
	}
?>

<?php
    //AQUI TA LOGADO
if (isset($_SESSION['usuario'])){
	$usuario = $_SESSION['usuario'];
	$user = $_SESSION['user'];
    $email = $_SESSION['email'];
	$nome = $_SESSION['nome'];
    $senha = $_SESSION['senha'];
}
?>
</body>
</html>


<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <style>
        body{
    		background-image: url(img/perfil.jpg); 
    		background-size: cover;
    		background-repeat: no-repeat;  
    	}
        #foto{
        width:150px;
        height:150px;
        border-radius:50%;
        background-color:#f95426;
        display: flex;
        align-items: center;
        }
        .card{ 
            display:flex;
            text-align: center;
            border-radius: 15px;
        }
    </style>

    </head>
<body>
    <nav class="navbar nav-expand-lg bg-light">
       <a class="navbar-brand nav-link justify-content-center" href="index.php">
        <img src="img/cristo.png" href='logout.php' width="100" class="d-inline-block align-center justify-content-center">
        Vai Pra lá.com
      </a>
      <ul class="nav justify-content-end">
          <li class="nav-item"><a href="sobre.php" class="nav-link">Sobre</a></li>
        </ul>

    <ul class='nav justify-content-end'>
        <form method='post' action='pesquisa.php'>
            <input type='search' id='pesquisa' name='pesquisa' placeholder='Procure aqui'>
            <button class='btn btn-success' type='submit'>Procurar</button>
        </form>
    </ul>
    </nav>
    <br>
    <div class='container'>
        <div class='row'>
            <div class='col-sm-6'>
                <div class='card text-center'>
                    <img class='img-thumbnail img-responsive img-top mx-auto d-block my-4' src="img/cu.jpg" alt="" width='50' id='foto'>
                    <div class='card-body'>
                    <h4 class='text-center'>Bem-vindo, <?php echo $_SESSION['nome'];?></h4>
                        <p class='list-group-item'>
                            <?php echo "
                                Usuario: ".$user."
                                <br> Nome: ".$nome."
                                <br> Email: ".$email."
                                <br> Senha: ".$senha; 
                            ?>
                        </p>
                        <a href='logout.php' class='btn btn-md btn-danger float-right'>Sair</a>
                        <button class='btn btn-success float-left' href='restrito.php'>Adiministrar</button>
                    </div>
                </div>
            </div>
            <br>
            <div class='col-sm-6'>
                <div class='card'>
                    <div class='card-body'>
                        <h5 class='card-title list-group-item my-2'>Lista de favoritos</h5>
                            <?php
                                $show = "SELECT * FROM favorito WHERE favorito.id_usuario=".$usuario;
                                        if ($query = $mysqli->query($show)) {
                                            while ($dados = $query->fetch_object()) {
                                                echo "<center>
                                                    <table border='1'>
                                                        <tr>
                                                        <th>Cidade favorita</th>
                                                        </tr> 
                                                        
                                                        <tr>
                                                        <td>" . $dados->id_cidade . "</td>
                                                        <td>" . $dados->id_usuario . "</td>
                                                        <td><a href=excluir.php?codigo_favorito=$dados->cd_favorito class='btn btn-danger' type='button'>Excluir</button></td>
                                                        </tr>
                                                    </table>
                                                    </center><br>";
                                            }
                                        }
                            ?>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>