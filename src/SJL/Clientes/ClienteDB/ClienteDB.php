<?php

namespace SJL\Clientes\ClienteDB;

use SJL\Clientes\Abstrato\Cliente;
use SJL\Clientes\Tipo\ClienteFisico;

class ClienteDB {

    private $conexao;
    private $clientes;

    public function __construct(\PDO $conn){
        $this->conexao = $conn;
    }

    public function persist(Cliente $cliente = NULL){
        $this->clientes[] = $cliente;
    }

    public function flush(){
        if($this->clientes != NULL){
            $clientes = $this->clientes;
            foreach($clientes as $cliente){
                if($cliente instanceof ClienteFisico) {

                    $this->conexao->query("INSERT INTO `clientefisico` VALUES
                    (NULL,'{$cliente->getNome()}','{$cliente->getEndereco()}',
                    '{$cliente->getEmail()}','{$cliente->getCpfcnpj()}',
                    '{$cliente->getEndcobranca()}','{$cliente->getGrau()}');");
                }
                else{

                    $this->conexao->query("INSERT INTO `clientejuridico` VALUES
                    (NULL,'{$cliente->getNome()}','{$cliente->getEndereco()}',
                    '{$cliente->getEmail()}','{$cliente->getCpfcnpj()}',
                    '{$cliente->getEndcobranca()}','{$cliente->getGrau()}');");

                }
            }
            return true;
        }
        return false;
    }

}
?>