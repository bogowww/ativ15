<?php

if ((isset($_POST['acao'])) && ($_POST['acao'] == 'salvar')){
  if ($_POST['codigo'] == 0){
  $novo = array(
      'id' => date("YmdHis"),
      'nome'   => $_POST['nome'],
      'partido'     => $_POST['partido'],
      'numero' => $_POST['numero']
  );
    salvar($novo);
  }
  else{
    $novo = array(
        'id' => $_POST['codigo'],
        'nome'   => $_POST['nome'],
        'partido'     => $_POST['partido'],
        'numero' => $_POST['numero']
    );
    editar($novo);
  }
}

if ((isset($_GET['acao'])) && ($_GET['acao'] == 'excluir')){
  excluir($_GET['item']);
}

function excluir($data){
  $json = buscar();
  $novo = array();
  for ($x = 0; $x < count($json); $x++){
    if ($json[$x]->id != $data)
      array_push($novo,$json[$x]);
  }
  $dados_json = json_encode($novo);
  $fp = fopen("dados.json", "w");
  fwrite($fp, $dados_json);
  fclose($fp);
  header("location:candidatos.php");
}

function editar($novo){
  $json = buscar();

  for ($x = 0; $x < count($json); $x++){
    if ($json[$x]->id == $novo['id']){
      $json[$x]->id = $novo['id'];
      $json[$x]->nome = $novo['nome'];
      $json[$x]->partido = $novo['partido'];
      $json[$x]->numero = $novo['numero'];

    }
  }

  $dados_json = json_encode($json);
  $fp = fopen("dados.json", "w");
  fwrite($fp, $dados_json);
  fclose($fp);
  header("location:candidatos.php");

}

function salvar($novo){
  var_dump($novo);
  $dados = buscar();
  array_push($dados,$novo);
  $dados_json = json_encode($dados);
  $fp = fopen("dados.json", "w");
  fwrite($fp, $dados_json);
  fclose($fp);
  header("location:candidatos.php");
}

function carregar($id){
  $arquivo = file_get_contents('dados.json');
  $json = json_decode($arquivo);

  foreach ($json as $key) {
    if ($key->id == $id)
      return $key;
  }
}


function buscar(){
  $arquivo = file_get_contents('dados.json');
  $json = json_decode($arquivo);
  if ($json == null)
    return array();
  else
    return $json;
}

function nome(){
    $json = buscar();

    foreach ($json as $value) 
      $saida = $value->nome;
    
    return $saida;
  }

  function partido(){
    $json = buscar();

    foreach ($json as $value) 
      $saida = $value->partido;
    
    return $saida;
  }

  function numero(){
    $json = buscar();

    foreach ($json as $value) 
      $saida = $value->numero;
    
    return $saida;
  }

    function mostrar(){
      $teste = 500;
      $json = buscar();

      $saida = "<table class='table' border='1'>
                <thead class='thead-dark'>
                <tr><th> Nome </th><th> Partido </th>
                <th> Número </th>
                <th align='center'> Editar </th>
                <th> Excluir </th>
                <th> Votar </th>
                <th> Votos </th></tr></thead>";
      foreach ($json as $value) {
        $saida .= "<tr><td>".$value->nome.
                    "</td><td>".$value->partido.
                    "</td><td>".$value->numero.
                    "</td><td align='center'><a href='candidatos1.php?acao=editar&item=".$value->id."'><img class='editar' src='img/editar.png' height='30' width='30'></a>".
                    "</td><td align='center'><a href='acao.php?acao=excluir&item=".$value->id."'><img class='excluir' src='img/excluir.png'height='30' width='30'></a></td>".
                    "</td><td align='center'><a href='acao.php?acao=votar&item=".$value->id."'><img class='votar' src='img/correto.png'height='30' width='30'></a></td>".
                    "</td><td align='center'><a href='acao.php?acao=votar&item=".$value->id."'></a></td></tr>";
                  
      }
      $saida .= "</table>";
      return $saida;
    }