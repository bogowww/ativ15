<?php
require_once "../../conf/Conexao.php";
    
$acao = "";
switch($_SERVER['REQUEST_METHOD']) {
    case 'GET':  $acao = isset($_GET['acao']) ? $_GET['acao'] : ""; break;
    case 'POST': $acao = isset($_POST['acao']) ? $_POST['acao'] : ""; break;
}

switch($acao){
    case 'excluir': excluir(); break;
    case 'salvar': salvar(); break;
}

function excluir(){    
    $codigo = isset($_GET['codigo']) ? $_GET['codigo']:0;
    $conexao = Conexao::getInstance();
    $conexao = $conexao->query("DELETE FROM candidatos where codigo = $codigo");
    header("location:index.php");
}

function salvar(){
    $nome = isset($_POST['nome']) ? $_POST['nome']: 0;
    $partido = isset($_POST['partido']) ? $_POST['partido']: 0;
    $numero = isset($_POST['numero']) ? $_POST['numero']: 0;
    $conexao = Conexao::getInstance();
    $conexao = $conexao->query("INSERT INTO candidatos (nome, partido, numero) VALUES ('$nome', $partido, $numero);");
    header("location:index.php");
}

function votar(){
    $nome = isset($_POST['nome']) ? $_POST['nome']: 0;
    $partido = isset($_POST['partido']) ? $_POST['partido']: 0;
    $numero = isset($_POST['numero']) ? $_POST['numero']: 0;
    $conexao = Conexao::getInstance();
    $conexao = $conexao->query("INSERT INTO candidatos (nome, partido, numero) VALUES ('$nome', $partido, $numero);");
    header("location:index.php");
}

function editar(){
    $codigo = isset($_POST['codigo']) ? $_POST['codigo']: 0;
    $nome = isset($_POST['nome']) ? $_POST['nome']: 0;
    $peso = isset($_POST['peso']) ? $_POST['peso']: 0;
    $altura = isset($_POST['altura']) ? $_POST['altura']: 0;
    $conexao = Conexao::getInstance();
    $conexao = $conexao->query("UPDATE atleta SET nome = '$nome',
                                peso = $peso, altura = $altura 
                                WHERE codigo = $codigo;");
    header("location:index.php");
}

function findById($codigo){
    $conexao = Conexao::getInstance();
    $conexao = $conexao->query("SELECT * FROM atleta WHERE codigo = $codigo;");
    $result = $conexao->fetch(PDO::FETCH_ASSOC);
    return $result; 
}
?>