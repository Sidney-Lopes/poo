<?php
class ClienteFisico extends Cliente implements ClienteInterface
{
    private $grau;
    private $endcobranca;

    public function __construct($cpfcnpj, $nome, $endereco, $email)
    {
        parent::__construct($cpfcnpj,$nome,$endereco,$email);
    }

    /**
     * @return mixed
     */
    public function getGrau()
    {
        return $this->grau;
    }

    /**
     * @param mixed $grau
     * @return $this
     */
    public function setGrau($grau)
    {
        $this->grau = $grau;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEndcobranca()
    {
        return $this->endcobranca;
    }

    /**
     * @param mixed $endcobranca
     */
    public function setEndcobranca($endcobranca)
    {
        $this->endcobranca = $endcobranca;
    }


}