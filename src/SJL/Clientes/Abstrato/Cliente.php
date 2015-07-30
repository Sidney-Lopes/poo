<?php

namespace SJL\Clientes\Abstrato;

use SJL\Clientes\ClienteInterfaces\EnderecoCobrancaInterface;
use SJL\Clientes\ClienteInterfaces\GrauImportanciaInterface;

abstract class Cliente implements EnderecoCobrancaInterface, GrauImportanciaInterface
{
    protected $nome;
    protected $endereco;
    protected $email;
    protected $cpfcnpj;
    protected $grau;
    protected $endcobranca;


    protected function __construct($cpfcnpj, $nome, $endereco, $email)
    {
        $this->setCpfcnpj($cpfcnpj);
        $this->setNome($nome);
        $this->setEndereco($endereco);
        $this->setEmail($email);
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param mixed $endereco
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getCpfcnpj()
    {
        return $this->cpfcnpj;
    }

    /**
     * @param mixed $cpfcnpj
     */
    public function setCpfcnpj($cpfcnpj)
    {
        $this->cpfcnpj = $cpfcnpj;
    }

    public function getEndcobranca()
    {
        return $this->endcobranca;
    }

    public function setEndcobranca($endcobranca)
    {
        $this->endcobranca = $endcobranca;
        return $this;
    }

    public function getGrau()
    {
        return $this->grau;
    }

    public function setGrau($grau)
    {
        $this->grau = $grau;
        return $this;
    }

}