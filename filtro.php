<?php
include 'conexao.php';

//AQUI QUANDO APERTAR NA REGIAO PRA MUDAR NOS DESTINOS
if(isset($_POST['regiao'])) {
    $regiao = $_POST['regiao'];
    $estados="";
    $getestado = "SELECT estado.cd_estado, estado.nm_estado, estado.id_regiao FROM estado WHERE estado.id_regiao =".$regiao;
		if($query = $mysqli->query($getestado)){
			if($query->num_rows>0){
				while($dados = $query->fetch_object()){
                    $_SESSION['cd_estado'] = $dados->cd_estado;
					$estados.="<option value=".$_SESSION['cd_estado'].">".$dados->nm_estado."</option>";					
				}
                echo $estados;
			}
		}
}


//AQUI QUANDO APERTAR NO ESTADO, APARECE AS CIDADES
if(isset($_POST['estado'])) {
    $estado = $_POST['estado'];
        $cidades="";
        $getcidade = "SELECT * FROM cidade WHERE cidade.id_estado =".$estado;
                if($query = $mysqli->query($getcidade)){
                    if($query->num_rows>0){
                        while($dados = $query->fetch_object()){
                            $_SESSION['cd_cidade'] = $dados->cd_cidade;
                            $nm_cidade=$dados->nm_cidade;

                            $cidades.="
                            <br>
                            <form method='post' action='cidade.php'>
                            <h4><button type='submit' id='cidade' name='cidade' class='cidade' value='".$_SESSION['cd_cidade']."'>".$nm_cidade."</button></h4>
                            </form>";
                        }
                    }  
                    echo $cidades;
                }

}

//AQUI QUANDO APERTAR NO CLIMA, MUDA LÁ
if(isset($_POST['clima'])) {
    $clima = $_POST['clima'];
        $cidadeclima="";
        $getclima = "SELECT * FROM cidadeclima, cidade WHERE cidadeclima.id_cidade =".$_SESSION['cd_cidade']." AND cidadeclima.id_clima =".$clima;
                if($query = $mysqli->query($getclima)){
                    if($query->num_rows>0){
                        while($dados = $query->fetch_object()){
                            $nm_cidade=$dados->nm_cidade;
                            $info=$dados->info;

                            $cidadeclima.="
                            <br>
                            <h4><a href='cidade.php' id='cidade' name='cidade' class='cidade' value='".$_SESSION['cd_cidade']."'>".$nm_cidade."</a></h4>";

                        }
                    }
                    echo $cidadeclima;
                }
}
?>






<script type="text/javascript">
        $(document).ready(function(){
            $(".favoritar").on("click", function(){
				var selecionado = $(this);
				var op_favoritar = selecionado.val();
                
				$.ajax({
                url: "botoes.php",
                type: "POST",
                data: 'favoritar='+op_favoritar,
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