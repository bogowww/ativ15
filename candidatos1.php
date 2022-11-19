<!DOCTYPE html>
<html lang="pt-BR">
<head>
<?php
  include "acao.php";

  $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
  $dados = $acao == 'editar' ? carregar($_GET['item']) : array();
?>
    <meta charset="UTF-8">
    <title>Edit Candidatos</title>
    <link rel="stylesheet" href="css/candidatos1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-light bg-dark">
        <a class="navbar-brand" href="candidatos.php">
          <img src="img/seta.png" alt="seta" width="57" height="24">
        </a>
    </nav>
    <div class="container">
        <div class="caxa2">
        <h1>MENU</h1>
    </div>
    <div class="caxa">
        <div class="box">
            <form action="acao.php" method="post">
                <input type="hidden" name="codigo"
                value="<?php if ($acao == 'editar') echo $dados->id; else echo 0; ?>"><br>
                <label for="nome">NOME:</label> <input name="nome" class="form-control" type="text" placeholder="Nome"
                value="<?php if ($acao == 'editar') echo $dados->nome;?>" required><br>
                <label for="partido">PARTIDO:</label> <input name="partido" class="form-control" type="text" placeholder="Partido"
                value="<?php if ($acao == 'editar') echo $dados->partido;?>"><br>
                <label for="numero">NÚMERO:</label> <input name="numero" class="form-control" type="text" placeholder="Número"
                value="<?php if ($acao == 'editar') echo $dados->numero;?>"><br>
                <input class="btn btn-secondary" type="submit" name="acao" value="salvar">

            </form>
            </div>
        </div>
    </div>
    </div>
</body>
</html>