<?php

namespace App\Model;

/**
 * 
 */
class ModelNegocio
{

    private $id;
    private $idUsuario;
    private $idCidade;
    private $idCategoria;
    private $nomeNegocio;
    private $whatsapp;
    private $endereco;
    private $formaPagamento;
    private $formaEntrega;
    private $img;
    private $descricao;
    private $keyWords;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function getIdCidade()
    {
        return $this->idCidade;
    }

    public function setIdCidade($idCidade)
    {
        $this->idCidade = $idCidade;
    }

    public function getNomeNegocio()
    {
        return $this->nomeNegocio;
    }

    public function setNomeNegocio($nomeNegocio)
    {
        $this->nomeNegocio = $nomeNegocio;
    }

    public function getWhatsapp()
    {
        return $this->whatsapp;
    }

    public function setWhatsapp($whatsapp)
    {
        $this->whatsapp = $whatsapp;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    public function getFormaPagamento()
    {
        return $this->formaPagamento;
    }

    public function setFormaPagamento($formaPagamento)
    {
        $this->formaPagamento = $formaPagamento;
    }

    public function getFormaEntrega()
    {
        return $this->formaEntrega;
    }

    public function setFormaEntrega($formaEntrega)
    {
        $this->formaEntrega = $formaEntrega;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function setImg($img)
    {
        $this->img = $img;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getKeyWords()
    {
        return $this->keyWords;
    }

    public function setKeyWords($keyWords)
    {
        $this->keyWords = $keyWords;
    }

    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;
    }
}
