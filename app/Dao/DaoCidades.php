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

				$cidade->setIdCidade( $resultado['idCidade']);
				$cidade->setNome($resultado['nome']); 
				$cidade->setCep($resultado['cep']);
				$cidade->setUf($resultado['uf']);
				$cidade->setImg($resultado['img']);

				array_push($cidades, $cidade);
			}

			$data['success'] = true;
			$data['data'] = $cidades;

		} catch (Exception $e) {

			$data['success'] = false;
			$data['data'] = 'Error: '.$e->getMessage();
		}	
		//header("Content-Type: application/json; charset=UTF-8");
		return $data;
	}



	public function getName($id)
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