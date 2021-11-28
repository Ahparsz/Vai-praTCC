<?php
//AQUI É O INICIO
include 'conexao.php';
include 'css/header.php';
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
              <form method='post' action='pesquisa.php' class='form-inline my-2 my-lg-0'>
                  <input class='form-control mr-sm-2' type='search' id='pesquisa' name='pesquisa' placeholder='Procure aqui'>
                  <button class='btn btn-outline-warning' type='submit'>Procurar</button>
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
      <form method='post' action='pesquisa.php' class='form-inline my-2 my-lg-0'>
        <input class='form-control mr-sm-2' type='search' id='pesquisa' name='pesquisa' placeholder='Procure aqui'>
        <button class='btn btn-outline-warning' type='submit'>Procurar</button>
      </form>
    </ul>
	 </nav>";
	}
?>

<center>
<div id='cidade'>
<?php
  if(isset($_POST['cd_cidade'])){  

    $sql = "SELECT * FROM cidade WHERE cidade.cd_estado =".$_POST['cd_cidade'];
    
    if($query = $mysqli->query($sql)){
      while($dados = $query->fetch_object()){
        $_SESSION['cd_cidade'] = $dados->cd_cidade;

        echo "
        <br>━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
        <div id='map'></div>
        <script async src='https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap'></script>
        
        <img src='/img/cidade/".$dados->cd_cidade.".jpg'>
        <br><h1>".$dados->nm_cidade."</h1>
        <br> ".$dados->info."<br>
        <br><button id='favoritar' value='".$_SESSION['cd_cidade']."' class='btn btn-danger'>FAVORITAR</button>
        
        <br>";	
      }
    }
  }
?>
</div>
</center>
</body>
</html>

<script type="text/javascript">
      $(document).ready(function(){
          $("#favoritar").on("click", function(){
			    var selecionado = $(this);
			    var op_fave = selecionado.val();
              
			    $.ajax({
              url: "botoes.php",
              type: "POST",
              data: 'favoritar='+op_fave,
              dataType: "html"

              }).done(function(resposta) {
                  $('#cidade').html(resposta);
				
              }).fail(function(jqXHR, textStatus ) {
                  console.log("Request failed: " + textStatus);

              }).always(function() {
                  console.log("completou");
              });				
          });
      });
</script>

<script>
      let map;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -33.897, lng: 250.644 },
    zoom: 8,
  });
}
</script>