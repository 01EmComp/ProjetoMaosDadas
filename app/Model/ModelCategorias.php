<?php 
namespace App\Model;


/**
* 
*/
class ModelCategorias
{
	private $id;
	private $nome;
	private $descricao;
	private $img;
	private $icon;

	
	function __construct()
	{
		$this->id =0;
		$this->nome ="";
		$this->descricao ="";
		$this->img = "";
		$this->icon = "";
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
	public function getIcon(){
		return $this->icon;
	}
	
	public function setIcon($icon){
		$this->icon = $icon;
	}
}
?>