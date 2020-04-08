<?php 
namespace App\Model;


/**
 * 
 */
class ModelTips
{
	private $id;
	private $nome;
	private $descricao;
	private $img;

	function __construct()
	{
		$this->id =0;
		$this->nome ="";
		$this->descricao ="";
		$this->img = "";
	}
}

public function getId(){
	return $this->id;
}

public function setId($id){
	$this->id = $id;
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

public function getImg(){
	return $this->img;
}

public function setImg($img){
	$this->img = $img;
}

?>