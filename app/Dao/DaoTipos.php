<?php 
namespace App\Dao;
use App\lib\Database\Connection;
use App\Model\ModelTipos;

class DaoTipos {
	
	private $con;
	
	function __construct(){
		$this->con = new Connection();
		$this->con = $this->con->getConn();
	}
	public function selectTiposCidade($idCidade){
		try {
			$query = "SELECT DISTINCT(idTipo) AS idTipo,`nome`, `descricao`, `img` FROM
			`VisaoFiltroCidadeTipos` WHERE idCidade = :idCidade";
			$stmt = $this->con->prepare($query);
			$stmt->bindValue(':idCidade',$idCidade);
			$stmt->execute();
			$tips = array();
			while($resultado = $stmt->fetch(\PDO::FETCH_ASSOC)){
				$tip = array("id" => $resultado['idTipo'],
				"nome" => $resultado['nome'], 
				"descricao" => $resultado['descricao'],
				"img" => $resultado['img']);
				array_push($tips, $tip);
			}
			
			$data['success'] = true;
			$data['data'] = $tips;
			
		} catch (Exception $e) {
			
			$data['success'] = false;
			$data['data'] = 'Error: '.$e->getMessage();
		}
		//header("Content-Type: application/json; charset=UTF-8");
		return json_encode($data);
	}
	
	public function getTipos(){
		try {
			$query = "SELECT * FROM Tipos";
			$stmt = $this->con->prepare($query);

			$stmt->execute();
			$tips = array();
			while($resultado = $stmt->fetch(\PDO::FETCH_ASSOC)){
				$tip = array("idTipo" => $resultado['idTipo'],
				"nome" => $resultado['nome'], );
				array_push($tips, $tip);
			}
			
			$data['success'] = true;
			$data['data'] = $tips;
			
		} catch (Exception $e) {
			
			$data['success'] = false;
			$data['data'] = 'Error: '.$e->getMessage();
		}
		//header("Content-Type: application/json; charset=UTF-8");
		return json_encode($data);
	}
	
	
	public function getNomeTipo($tipo)
	{
		try {
			$query = "SELECT nome FROM Tipos WHERE idTipo = :tipo";
			$stmt = $this->con->prepare($query);
			$stmt->bindValue(':tipo',$tipo);
			$stmt->execute();
			while($resultado = $stmt->fetch(\PDO::FETCH_ASSOC)){
				$tip = array("nome" => $resultado['nome']);
			}
			
			$data['success'] = true;
			$data['data'] = $tip;
			
		} catch (Exception $e) {
			
			$data['success'] = false;
			$data['data'] = 'Error: '.$e->getMessage();
		}
		//header("Content-Type: application/json; charset=UTF-8");
		return json_encode($data);
	}
}

?>