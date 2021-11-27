<?php
//FIM NÉ
include('conexao.php');
session_destroy();
header("location: index.php");
?>