<?php
class Cliente
{
    private $cpf;
    private $nome;
    private $endereco;
    private $email;

    public function __construct($cpf, $nome, $endereco, $email){
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->email = $email;
    }

    public function getCpf(){
        return $this->cpf;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getEndereco(){
        return $this->endereco;
    }
    public function getEmail(){
        return $this->email;
    }
}