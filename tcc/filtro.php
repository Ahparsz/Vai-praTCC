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
    $_SESSION['estado'] = $_POST['estado'];
        $cidades="";
        $getcidade = "SELECT * FROM cidade WHERE cidade.id_estado =".$_SESSION['estado'];
                if($query = $mysqli->query($getcidade)){
                    if($query->num_rows>0){
                        while($dados = $query->fetch_object()){
                            $_SESSION['cd_cidade'] = $dados->cd_cidade;
                            $nm_cidade=$dados->nm_cidade;

                            $cidades.="
                            <br>
                            <h4><a href=cidades.php?codigo_filtro=".$_SESSION['cd_cidade'].">".$nm_cidade."</a></h4>";
                        }
                    }  
                    echo $cidades;
                }

}

//AQUI QUANDO APERTAR NO CLIMA, MUDA LÁ
if(isset($_POST['clima'])) {
    $_SESSION['clima'] = $_POST['clima'];
    $cidades='';

    $uau="SELECT * FROM cidade, cidadeclima, clima WHERE cidade.cd_cidade = cidadeclima.id_cidade AND clima.cd_clima = cidadeclima.id_clima AND cidade.id_estado =".$_SESSION['estado'];
    $clima = " AND cidadeclima.id_clima=".$_SESSION['clima'];
    $ambiente = "";
    $tipo = "";

    $sql = $uau.$clima.$ambiente.$tipo;
    if($query = $mysqli->query($sql)){
        if($query->num_rows>0){
            while($dados = $query->fetch_object()){
                $_SESSION['cd_cidade'] = $dados->cd_cidade;
                $nm_cidade=$dados->nm_cidade;

                $cidades.="
                <br>
                <h4><a href=cidades.php?codigo_filtro=".$_SESSION['cd_cidade'].">".$nm_cidade."</a></h4>
                ";
            }
        }  
        echo $cidades;
    }
}

//AQUI QUANDO APERTAR NO AMBIENTE, MUDA LÁ
if(isset($_POST['ambiente'])) {
    $cidades='';

    $uau="SELECT * FROM cidade, cidadeambiente, ambiente WHERE cidade.cd_cidade = cidadeambiente.id_cidade AND ambiente.cd_ambiente = cidadeambiente.id_ambiente AND cidade.id_estado =".$_SESSION['estado'];
    $clima = "";
    $ambiente = " AND cidadeambiente.id_ambiente=".$_POST['ambiente'];
    $tipo = "";

    $sql = $uau.$clima.$ambiente.$tipo;
    echo $sql;
    if($query = $mysqli->query($sql)){
        if($query->num_rows>0){
            while($dados = $query->fetch_object()){
                $_SESSION['cd_cidade'] = $dados->cd_cidade;
                $nm_cidade=$dados->nm_cidade;

                $cidades.="
                <br>
                <h4><a href=cidades.php?codigo_filtro=".$_SESSION['cd_cidade'].">".$nm_cidade."</a></h4>
                ";
            }
        }  
        echo $cidades;
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