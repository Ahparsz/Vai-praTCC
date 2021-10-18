<?php
include 'conexao.php';
include 'header.php';

  // A sessão precisa ser iniciada em cada página diferente
  if (!isset($_SESSION)) session_start();

  $nivel_necessario = 2;

    // Verifica se não há a variável da sessão que identifica o usuário
    if (!isset($_SESSION['usuario']) OR ($_SESSION['nivel'] < $nivel_necessario)) {
        header("Location: index2.php"); exit;
    }
        

  ?>

  <h1>Página restrita</h1>
  <p>Olá, <?php echo $_SESSION['user'];?>!</p>

  <a href="inserir.php" class="btn btn-dark">INSERIR DADOS</a>
  
  <style>
        body{
        margin-left: 20px;
        margin-top: 20px;
    }
  </style>
  </body>
  </html>
