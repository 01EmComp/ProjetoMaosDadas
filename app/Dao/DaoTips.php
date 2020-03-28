<?php 
namespace App\Dao;
use App\lib\Database\Connection;
use App\Model\ModelTips;

class DaoTips {
	
	private $conn;

	function __construct(){
		$this->con = new Connection;
		$this->con = $this->con->getConn();
	}
	public function selectTips(){
		try {
			$query = "SELECT * FROM Tipos";
			$stmt = $this->con->prepare($query);
			
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
}

?>