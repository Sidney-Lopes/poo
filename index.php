<?php
require_once("assets/config.php");
require_once("assets/autoload.php");

use SJL\Clientes\Tipo\ClienteFisico;
use SJL\Clientes\Tipo\ClienteJuridico;

$g = $j =1;
for($i=0; $i<=9; $i++){
    if($i%2 == 0) {
        $clientes[$i] = new ClienteFisico("999.999.999-9{$i}", "Nome{$i}", "Rua Qualquer, numero {$i}", "nome{$i}@yahoo.com.br");
        $clientes[$i]->setGrau($g);
        $g++;
    }
    else{
        $clientes[$i] = new ClienteJuridico("99.999.999/9999-9{$i}", "Empresa{$i}", "Rua do Empresário, numero {$i}", "contato@empresa{$i}.com.br");
        $clientes[$i]->setGrau($j);
        $j++;
    }
}

// supondo que nem todo Clientes vai ter endereço de cobrança diferente
$clientes[1]->setEndcobranca("Rua do Pato, numero 13");
$clientes[5]->setEndcobranca("Rua Devo não Nego, numero 20");
$clientes[7]->setEndcobranca("Rua Pago Quando Puder, numero 171");
$clientes[9]->setEndcobranca("Avenida do Calote, numero 1001");

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