<?php 
namespace App\Model;

/**
 * 
 */
class ModelSchedules
{
	private $id;
	private $idUser;
	private $nome;
	private $dataInicio;
	private $dataFim;
	private $horaInicio;
	private $horaFim;
	private $desc;

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getIdUser(){
		return $this->idUser;
	}

	public function setIdUser($idUser){
		$this->idUser = $idUser;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getDataInicio(){
		return $this->dataInicio;
	}

	public function setDataInicio($dataInicio){
		$this->dataInicio = $dataInicio;
	}

	public function getDataFim(){
		return $this->dataFim;
	}

	public function setDataFim($dataFim){
		$this->dataFim = $dataFim;
	}

	public function getHoraInicio(){
		return $this->horaInicio;
	}

	public function setHoraInicio($horaInicio){
		$this->horaInicio = $horaInicio;
	}

	public function getHoraFim(){
		return $this->horaFim;
	}

	public function setHoraFim($horaFim){
		$this->horaFim = $horaFim;
	}

	public function getDesc(){
		return $this->desc;
	}

	public function setDesc($desc){
		$this->desc = $desc;
	}
	//essa função copia tudo que vem da tabela no banco de dados e tranforma em um objeto dessa classe
	public function copy($schedule)
	{
		$this->id = $schedule->id;
		$this->idUser = $schedule->idUser;
		$this->id = $schedule->id;
		$this->id = $schedule->id;
		$this->id = $schedule->id;
		$this->id = $schedule->id;
		$this->id = $schedule->id;
		$this->id = $schedule->id;
	}
}

?>