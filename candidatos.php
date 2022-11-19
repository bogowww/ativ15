<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <?php 
  include_once "acao.php";
  ?>
    <meta charset="UTF-8">
    <title>Candidatos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/candidatos.css">
</head>

<body>
    <nav class="navbar navbar-light bg-dark">
        <a class="navbar-brand" href="index.php">
          <img src="img/seta.png" alt="seta" width="57" height="24">
        </a>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>ADICIONAR CANDIDATOS:</h1>
            </div>
            <div class="col-md-3">  
                <a href="candidatos1.php"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                  </svg></a>
            </div>
            <div class="cand">
            <div class="col-md-12">
                <h1>
                    <?php
                    echo mostrar();
                    ?>
                </h1>
            </div>
            </div>
        <h1>Votos totais:</h1>
    </div>
    </div>
</body>