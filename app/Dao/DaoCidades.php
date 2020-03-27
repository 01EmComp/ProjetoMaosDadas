<?php 
namespace App\Dao;
use App\lib\Database\Connection;
use App\Model\ModelCidades;

class DaoCidades 
{
	
	private $con;

	function __construct()
	{
		$this->con = new Connection;
		$this->con = $this->con->getConn();
	}
	public function runQuery($query)
	{
		$stmt = $this->con->prepare($query);
		return $stmt;
	}
	public function selecionaCidades()
	{
		$query = "SELECT * FROM cidades";
		$stmt = $this->con->prepare($query);
		$stmt->execute();
		$cidade = new Modelcidades;
		while ($result = $stmt->fetch(\PDO::FETCH_OBJ)) {
			$cidade->setId($result->id);
			$cidade->setNome($result->nome);
			$cidade->setCargaObrigatoria($result->carga_obrigatoria);
			$cidade->setCargaOptativa($result->carga_optativa);
			$cidade->setAtvComplementares($result->atv_complementares);
			$cidade->setTcc($result->tcc);
			$cidade->setPeriodos($result->periodos);
			$cidades[] = $cidade;
		}
		return $cidades;
		
	}
}

 ?>