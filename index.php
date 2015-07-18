<?php
require_once("config.php");
require_once("Cliente.php");

for($i=0; $i<=9; $i++){
    $clientes[] = new Cliente("0000000000{$i}","Nome{$i}", "Rua Qualquer, numero {$i}", "Nome{$i}@yahoo.com.br");
}

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pagina = ltrim($url, "/");
$segments = explode('/', $pagina);

$segments['0'] = empty($segments['0']) ? "lista-clientes" : $segments['0'];

if(file_exists($segments['0'].".php")){
    require_once('content.php');
}
else{
    require_once('404.php');
}
?>