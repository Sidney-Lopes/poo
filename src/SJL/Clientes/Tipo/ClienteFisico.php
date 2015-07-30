<?php

namespace SJL\Clientes\Tipo;

use SJL\Clientes\Abstrato\Cliente;

class ClienteFisico extends Cliente
{
    public function __construct($cpfcnpj, $nome, $endereco, $email)
    {
        parent::__construct($cpfcnpj,$nome,$endereco,$email);
    }
}