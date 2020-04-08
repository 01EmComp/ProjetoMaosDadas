<?php 
namespace App\Model;

/**
 * 
 */
class ModelProdutor
{

	private $id;
	private $idCidade;
	private $nome;
	private $nomeSocial;
	private $whatsapp;
	private $endereco;
	private $formaPagamento;
	private $formaEntrega;
	private $img;
	private $descricao;
	private $keyWords;
	private $idTipo;
	
	function __construct()
	{
		$this->id = "";
		$this->idCidade = "";
		$this->nome = "";
		$this->nomeSocial = "";
		$this->whatsapp = "";
		$this->endereco = "";
		$this->formaPagamento = "";
		$this->formaEntrega = "";
		$this->img = "";
		$this->descricao = "";
		$this->keyWords = "";
		$this->idTipo = "";
	}

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getIdCidade(){
		return $this->idCidade;
	}

	public function setIdCidade($idCidade){
		$this->idCidade = $idCidade;
	}
	public function getIdTipo(){
		return $this->idTipo;
	}

	public function setIdTipo($idTipo){
		$this->idTipo = $idTipo;
	}
	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getNomeSocial(){
		return $this->nomeSocial;
	}

	public function setNomeSocial($nomeSocial){
		$this->nomeSocial = $nomeSocial;
	}

	public function getWhatsapp(){
		return $this->whatsapp;
	}

	public function setWhatsapp($whatsapp){
		$this->whatsapp = $whatsapp;
	}

	public function getEndereco(){
		return $this->endereco;
	}

	public function setEndereco($endereco){
		$this->endereco = $endereco;
	}

	public function getFormaPagamento(){
		return $this->formaPagamento;
	}

	public function setFormaPagamento($formaPagamento){
		$this->formaPagamento = $formaPagamento;
	}

	public function getFormaEntrega(){
		return $this->formaEntrega;
	}

	public function setFormaEntrega($formaEntrega){
		$this->formaEntrega = $formaEntrega;
	}

	public function getImg(){
		return $this->img;
	}

	public function setImg($img){
		$this->img = $img;
	}

	public function getDescricao(){
		return $this->descricao;
	}

	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}

	public function getKeyWords(){
		return $this->keyWords;
	}

	public function setKeyWords($keyWords){
		$this->keyWords = $keyWords;
	}

	
}

?>