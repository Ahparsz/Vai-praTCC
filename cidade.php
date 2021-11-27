<?php
//AQUI É O INICIO

include 'conexao.php';
include 'css/header.php';
if (!isset($_SESSION)) session_start();
?>

<html>
<meta charset="utf-8">
  <head>
    <title>Vai pra lá.com</title>
    <!-- Required meta tags -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style type="text/css">
      #bolotas{
        width:150px;
        height:150px;
        float:left;
        margin-left:20px;
        text-align:center;
        line-height: 150px;
        font-size:20px;
        border-radius:50%;
        background-color:#3d00a9;
        transition:all 0.4s ease-out;
      }
      #bolotas:hover{
        cursor:pointer;
        transform:translateY(-20px);
        box-shadow: 4px 30px 16px 2px #888;
      }
      .carousel-inner img{
        width:100%; 
        position: relative;
        margin: auto;
      }
      .carousel-indicators{
        bottom:auto;
        position: absolute;
        left:60%;
        top:90%;
      }
      .carousel-caption{
        top: 30%;
        bottom: auto;
        position: absolute;
        left: 70%;
        border-radius: 10px;
        margin: 0px;
        width: 20%;
      }
      #buttonca{
        background: none;
        border:0;
        position: relative;
        transition: all 500ms ease-in-out;
      }
      #buttonca:after{
        content:'';
        transition: inherit; 
        width: 40px;
        height: 40px;
        border-radius:50%;
        background-color:#fd096b;
        position: absolute;
        top:-28%;
        left:-10px;
        opacity: 0.3;
        z-index:-1;
      }
      #buttonca:hover:after{
        width: calc(100% + 20px);
        border-radius: 20px;
        opacity: 0.6;

      }
      #botao-card{
        float:right;
      }
      @media (max-width: 1024px){
        .carousel-inner {
          width: 100%; 
          position: relative;
        }
      }

    </style>
  </head>
  <body>
<?php
	//AQUI É O INICIO LOGADO PODE SER O PERFIL
		if (isset($_SESSION['usuario'])){
			$usuario = $_SESSION['usuario'];
			$user = $_SESSION['user'];
		
			echo "<nav class='navbar nav-expand-lg bg-light'>
			<a class='navbar-brand nav-link justify-content-center' href='index.php'>
			 <img src='img/cristo.png' width='100' class='d-inline-block align-center justify-content-center'>
			 Vai Pra lá.com
		   </a>
		   <ul class='nav justify-content-end'>
			   <li class='nav-item'><a href='sobre.php' class='nav-link'>Sobre</a></li>
			   <li class='nav-item'><a href='perfil.php' class='nav-link'>Perfil</a></li>
			</ul>
            
            <ul class='nav justify-content-end'>
                <form method='post' action='cidade.php'>
                    <input type='search' id='pesquisa' name='pesquisa' placeholder='Procure aqui'>
                    <button class='btn btn-success' type='submit'>Procurar</button>
                </form>
            </ul>
		 </nav>";
		}
?>
<?php
	//AQUI É O NÃO LOGADO
	if (!isset($_SESSION['usuario'])){
		echo "<nav class='navbar nav-expand-lg bg-light'>
		<a class='navbar-brand nav-link justify-content-center' href='index.php'>
		 <img src='img/cristo.png' width='100' class='d-inline-block align-center justify-content-center'>
		 Vai Pra lá.com
	   </a>
       <ul class='nav justify-content-end'>
       <li class='nav-item'><a href='sobre.php' class='nav-link'>Sobre</a></li>
       <li class='nav-item'><a href='login.php' class='nav-link'>Entrar</a></li>
    </ul>
    
    <ul class='nav justify-content-end'>
        <form method='post' action='cidade.php'>
            <input type='search' id='pesquisa' name='pesquisa' placeholder='Procure aqui'>
            <button class='btn btn-success' type='submit'>Procurar</button>
        </form>
    </ul>
	 </nav>";
	}
?>

<center>
<?php
    if(isset($_SESSION['cd_cidade'])){
        $cidades="";
        $getcidade = "SELECT * FROM cidade WHERE cidade.cd_estado =".$_SESSION['cd_cidade'];
                if($query = $mysqli->query($getcidade)){
                    if($query->num_rows>0){
                        while($dados = $query->fetch_object()){
                            $cd_cidade = $dados->cd_cidade;
                            $nm_cidade = $dados->nm_cidade;
                            $info = $dados->info;
                            $foto = $dados->foto;

                            $cidades.="
                            <br>━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

                            <br><h1>".$nm_cidade."</h1>
                            <br> ".$info."<br>
                            <br><button id='favoritar' class='btn btn-danger'>FAVORITAR</button><br>
                            <br>";		
                        }
                    }  
                    echo $cidades;
                }
    }
?>

<?php include 'pesquisa.php'; ?>
</center>
      </body>
    </html>