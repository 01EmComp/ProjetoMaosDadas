<?php 
namespace App\Model;

/**
 * 
 */
class ModelVisaoGeralTiposProdutores 
{
	
	private $idTipo;
	private $idProdutores;
	private $idCidade;
	private $img;
	private $nome;
	private $descricao;
	private $whatsapp;

	function __construct()
	{
		$this->idTipo = "";
		$this->idProdutores = "";
		$this->idCidade = "";
		$this->img = "";
		$this->nome = "";
		$this->descricao = "";
		$this->whatsapp = "";	
	}

	public function getIdTipo(){
		return $this->idTipo;
	}

	public function setIdTipo($idTipo){
		$this->idTipo = $idTipo;
	}

	public function getIdProdutores(){
		return $this->idProdutores;
	}

	public function setIdProdutores($idProdutores){
		$this->idProdutores = $idProdutores;
	}

	public function getIdCidade(){
		return $this->idCidade;
	}

	public function setIdCidade($idCidade){
		$this->idCidade = $idCidade;
	}

	public function getImg(){
		return $this->img;
	}

	public function setImg($img){
		$this->img = $img;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getDescricao(){
		return $this->descricao;
	}

	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}

	public function getWhatsapp(){
		return $this->whatsapp;
	}

	public function setWhatsapp($whatsapp){
		$this->whatsapp = $whatsapp;
	}
	
}

?>