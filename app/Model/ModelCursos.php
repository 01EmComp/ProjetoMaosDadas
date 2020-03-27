<?php 
/**
 * 
 */
namespace App\Model;
class ModelCursos
{
	private $id;
	private $nome;
	private $cargaObrigatoria;
	private $cargaOptativa;
	private	$atvComplementares;
	private $tcc;
	private $periodos;

	
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

	public function getCargaObrigatoria(){
		return $this->cargaObrigatoria;
	}

	public function setCargaObrigatoria($cargaObrigatoria){
		$this->cargaObrigatoria = $cargaObrigatoria;
	}

	public function getCargaOptativa(){
		return $this->cargaOptativa;
	}

	public function setCargaOptativa($cargaOptativa){
		$this->cargaOptativa = $cargaOptativa;
	}

	public function getAtvComplementares(){
		return $this->atvComplementares;
	}

	public function setAtvComplementares($atvComplementares){
		$this->atvComplementares = $atvComplementares;
	}

	public function getTcc(){
		return $this->tcc;
	}

	public function setTcc($tcc){
		$this->tcc = $tcc;
	}

	public function getPeriodos(){
		return $this->periodos;
	}

	public function setPeriodos($periodos){
		$this->periodos = $periodos;
	}

}
?>