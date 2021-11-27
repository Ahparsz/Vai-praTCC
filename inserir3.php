<?php

include 'conexao.php';

if ($result = $mysqli->query("select * from clima")) {
    while($obj = $result->fetch_object()){
        if(isset($_POST[$obj->nm_clima])){
            echo $_POST[$obj->nm_clima];
            if($query = $mysqli->query("insert into cidadeclima values (".$_POST['cidade'].", ".$_POST[$obj->nm_clima].")")){
                echo "Yay";
            }
        }
    }
}

if ($result = $mysqli->query("select * from ambiente")) {
    while($obj = $result->fetch_object()){
        if(isset($_POST[$obj->nm_ambiente])){
            echo $_POST[$obj->nm_ambiente];
            if($query = $mysqli->query("insert into cidadeambiente values (".$_POST['cidade'].", ".$_POST[$obj->nm_ambiente].")")){
                echo "Yay";
            }
        }
    }
}

if ($result = $mysqli->query("select * from tipo")) {
    while($obj = $result->fetch_object()){
        if(isset($_POST[$obj->nm_tipo])){
            echo $_POST[$obj->nm_tipo];
            if($query = $mysqli->query("insert into cidadetipo values (".$_POST['cidade'].", ".$_POST[$obj->nm_tipo].")")){
                echo "Yay";
            }
        }
    }
}

header("Location: restrito.php");

?>