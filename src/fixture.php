<?php
echo "========== - INICIANDO FIXTURE - ========== \n\n";

require_once("../public_html/assets/config.php");
require_once("../public_html/assets/autoload.php");

use SJL\Clientes\Tipo\ClienteFisico;
use SJL\Clientes\Tipo\ClienteJuridico;
use SJL\Conexao;
use SJL\Clientes\ClienteDB\ClienteDB;

$g = $j = 1;
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

// supondo que nem todo Cliente vai ter endereço de cobrança diferente
$clientes[1]->setEndcobranca("Rua do Pato, numero 13");
$clientes[5]->setEndcobranca("Rua Devo não Nego, numero 20");
$clientes[7]->setEndcobranca("Rua Pago Quando Puder, numero 171");
$clientes[9]->setEndcobranca("Avenida do Calote, numero 1001");

/************************** CONEXÃO ***********************/
$user = Conexao::$db['usuario'];
$password = Conexao::$db['senha'];
$dsn = Conexao::$db['stringDB'] . ":host=" . Conexao::$db['host']. ";charset=utf8";
$conn = new \PDO($dsn, $user, $password);
/*********************************************************/


echo "=> DELETANDO BANCO DE DADOS " . Conexao::$db['banco'] . "...\n";
$conn->exec("DROP SCHEMA IF EXISTS " . Conexao::$db['banco']);

echo "=> CRIANDO BANCO DE DADOS " . Conexao::$db['banco'] . "...\n";
$conn->exec("CREATE SCHEMA " . Conexao::$db['banco']);

echo "=> SELECIONANDO BANCO DE DADOS " . Conexao::$db['banco'] . "...\n";
$conn->exec("USE " . Conexao::$db['banco']);

echo "=> CRIANDO TABELA CLIENTEFISICO ...\n";
$conn->query("CREATE TABLE `clientefisico`
(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `endcobranca` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `grau` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
);
");

echo "=> CRIANDO TABELA CLIENTEJURIDICO ...\n";
$conn->query("CREATE TABLE `clientejuridico`
(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cnpj` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `endcobranca` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `grau` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
);
");


echo "=> INSERINDO DADOS DE TESTE ...\n\n";

$NovoCliente = new ClienteDB(Conexao::DBConect());

foreach($clientes as $cliente){
    $NovoCliente->persist($cliente);
}

if($NovoCliente->flush()){
    echo "=> DADOS INSERIDOS COM SUCESSO !...\n\n";
}

echo "========== - FIXTURE TERMINADA ! - ======== \n";
?>