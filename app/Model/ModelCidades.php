<?php 
namespace App\Model;

/**
 * 
 */
class ModelCidades 
{
	
	private $idCidade;
	private $nome;
	private $cep;
	private $uf;
	private $img;
	private $ordemExibicao;

	function __construct()
	{
		$this->idCidade = "";
		$this->nome = "";
		$this->cep = "";
		$this->uf = "";
		$this->img = "";
	}

	public function getIdCidade(){
		return $this->idCidade;
	}

	public function setIdCidade($idCidade){
		$this->idCidade = $idCidade;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getCep(){
		return $this->cep;
	}

	public function setCep($cep){
		$this->cep = $cep;
	}

	public function getUf(){
		return $this->uf;
	}

	public function setUf($uf){
		$this->uf = $uf;
	}

	public function getImg(){
		return $this->img;
	}

	public function setImg($img){
		$this->img = $img;
	}
	public function getOrdemExibicao(){
		return $this->ordemExibicao;
	}

	public function setOrdemExibicao($ordemExibicao){
		$this->ordemExibicao = $ordemExibicao;
	}
}