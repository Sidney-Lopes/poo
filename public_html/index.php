<?php
require_once("assets/config.php");
require_once("assets/autoload.php");
use SJL\Conexao;
use SJL\Clientes\Tipo\ClienteFisico;
use SJL\Clientes\Tipo\ClienteJuridico;

$sql = "select * from clientefisico";
$conn = Conexao::DBConect();
$stmt = $conn->prepare($sql);
$stmt->execute();
$ClientesFisicos = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql2 = "select * from clientejuridico";
$stmt = $conn->prepare($sql2);
$stmt->execute();
$ClientesJuridicos = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($ClientesJuridicos as $key => $ClienteJuridico){
    $clientesJ[$key] = new ClienteJuridico($ClienteJuridico['cnpj'],$ClienteJuridico['nome'],$ClienteJuridico['endereco'],$ClienteJuridico['email']);
    $clientesJ[$key]->setGrau($ClienteJuridico['grau']);
    $clientesJ[$key]->setEndcobranca($ClienteJuridico['endcobranca']);
}

foreach($ClientesFisicos as $key => $ClienteFisico){
    $clientesF[$key] = new ClienteFisico($ClienteFisico['cpf'],$ClienteFisico['nome'],$ClienteFisico['endereco'],$ClienteFisico['email']);
    $clientesF[$key]->setGrau($ClienteFisico['grau']);
    $clientesF[$key]->setEndcobranca($ClienteFisico['endcobranca']);
}

$clientes = array_merge($clientesJ,$clientesF);

// url site
$base = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pagina = ltrim($url, "/");
$segments = explode('/', $pagina);

$segments['0'] = empty($segments['0']) ? "lista-clientes" : $segments['0'];

if(file_exists("assets/" . $segments['0'] . ".php")){
    require_once('assets/content.php');
}
else{
    require_once('assets/404.php');
}
?>