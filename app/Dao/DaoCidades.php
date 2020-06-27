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
			$query = "SELECT * FROM Cidades ORDER BY ordemExibicao ASC";
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
				
			} catch (\Exception $e) {
				
				$data['success'] = false;
				$data['data'] = 'Error: '.$e->getMessage();
			}	
			
			return $data;
		}
		
		
		
		public function selectCidade($id)
		{
			try {
				$query = "SELECT * FROM Cidades WHERE idCidade = :id";
				
				$stmt = $this->con->prepare($query);
				$stmt->bindValue(':id',$id);
				
				$stmt->execute();
				$rst = $stmt->fetch(\PDO::FETCH_ASSOC);
				
				$name = array("nome" => $rst['nome'],
				"uf" => $rst['uf'],
				"cep" => $rst['cep'],
				"img" => $rst['img']);
				
				$data['success'] = true;
				$data['data'] = $name;
				
			} catch (\Exception $e) {
				
				$data['success'] = false;
				$data['data'] = 'Error: '.$e->getMessage();
			}
			return $data;
		}
		
		public function cadastrar(ModelCidades $cidade)
		{
			try {
				$query = "INSERT INTO `Cidades`(`nome`, `cep`, `uf`,`img`,`ordemExibicao`) 
				VALUES(:nome, :cep, :uf,:img, :ordem);";
				$stmt = $this->con->prepare($query);
				$stmt->bindValue(':nome',$cidade->getNome());
				$stmt->bindValue(':cep',$cidade->getCep());
				$stmt->bindValue(':uf',$cidade->getUf());
				$stmt->bindValue(':img','');
				$stmt->bindValue(':ordem',1);
				
				if($stmt->execute()){
					$stmt = $this->con->prepare("SELECT MAX(idCidade) AS id FROM `Cidades`");
					$stmt->execute();
					$resultado = $stmt->fetch(\PDO::FETCH_ASSOC);
					
					$cidade = array("idCidade" => $resultado['id']);
					
					$data['success'] = true;
					$data['data'] = $cidade;
				}
				else{
					$data['success'] = false;
					$data['data'] = $stmt->errorInfo();
				}
			} catch (\Exception $e) {
				
				$data['success'] = false;
				$data['data'] = 'Error: '.$e->getMessage();
			}	
			
			return $data;
		}


		public function editar(ModelCidades $cidade)
		{
			try {
				$query = "UPDATE `Cidades` SET `nome`=:nome,`cep`=:cep,
				`uf`=:uf WHERE idCidade=:id";
				$stmt = $this->con->prepare($query);
				$stmt->bindValue(':id',$cidade->getIdCidade());
				$stmt->bindValue(':nome',$cidade->getNome());
				$stmt->bindValue(':cep',$cidade->getCep());
				$stmt->bindValue(':uf',$cidade->getUf());
					
				if($stmt->execute()){

					$data['success'] = true;
					$data['msg'] = "Cadastrada com sucesso";
				}
				else{
					$data['success'] = false;
					$data['msg'] = $stmt->errorInfo();
				}
			} catch (\Exception $e) {
				
				$data['success'] = false;
				$data['msg'] = 'Error: '.$e->getMessage();
			}	
			
			return $data;
		}

		public function apagar($id)
	{
		try {
			$query = "DELETE FROM `Cidades` WHERE `idCidade`=:id;";
			$stmt = $this->con->prepare($query);
			
			$stmt->bindValue(':id',$id);
			
			if($stmt->execute()){
				$data['success'] = true;
				$data['data'] = "Apagado com sucesso.";
			}
			else{
				$data['success'] = false;
				$data['data'] = $stmt->errorInfo();
			}
		} catch (\Exception $e) {
			
			$data['success'] = false;
			$data['data'] = 'Error: '.$e->getMessage();
		}	
	
		return $data;
	}	

		public function setImgName($id,$imgName){
			
			try {
				$query = "UPDATE `Cidades` SET `img` = :img WHERE idCidade = :id;";
				$stmt = $this->con->prepare($query);
				
				$stmt->bindValue(':id',$id);
				$stmt->bindValue(':img',$imgName);
				
				if($stmt->execute()){
					return true;
				}
			} catch (\Exception $e) {
				return false;
			}	
		}
	}
	
	?>