<?php
class ClienteFisico extends Cliente
{
    public function __construct($cpfcnpj, $nome, $endereco, $email)
    {
        parent::__construct($cpfcnpj,$nome,$endereco,$email);
    }
}