<?php 
namespace App\Dao;
use App\lib\Database\Connection;
use App\Model\ModelCidades;

/**
 * 
 */
class DaoCidades 
{
	private $con;


	function __construct(){
		$this->con = new Connection;
		$this->con = $this->con->getConn();
	}


	public function selectCidades()
	{
		try {
			$query = "SELECT * FROM Cidades";
			$stmt = $this->con->prepare($query);
			$stmt->execute();
			$cidade = new ModelCidades();
			$cidades = array();
			while($resultado = $stmt->fetch(\PDO::FETCH_ASSOC)){

				$cidade = array( 
					"idCidade" => $resultado['idCidade'],
					"nome" => $resultado['nome'],
					"cep" => $resultado['cep'],
					"ud" => $resultado['uf'],
					"img" => $resultado['img']);

				array_push($cidades, $cidade);
			}

			$data['success'] = true;
			$data['data'] = $cidades;

		} catch (Exception $e) {

			$data['success'] = false;
			$data['data'] = 'Error: '.$e->getMessage();
		}	

		//header("Content-Type: application/json; charset=UTF-8");
		return json_encode($data);
	}



	public function getNome($id)
	{
		try {
			$query = "SELECT nome FROM Cidades WHERE idCidade = :id";

			$stmt = $this->con->prepare($query);
			$stmt->bindValue(':id',$id);

			$stmt->execute();
			$rst = $stmt->fetch(\PDO::FETCH_ASSOC);

			$name = array("nome" => $rst['nome']);

			$data['success'] = true;
			$data['data'] = $name;

		} catch (Exception $e) {

			$data['success'] = false;
			$data['data'] = 'Error: '.$e->getMessage();
		}
		//header("Content-Type: application/json; charset=UTF-8");
		return json_encode($data);
	}
}

?>