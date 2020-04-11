<?php 
namespace App\Dao;
use App\lib\Database\Connection;
use App\Model\ModelCategorias;

class DaoTipos {
	
	private $con;
	
	function __construct(){
		$this->con = new Connection();
		$this->con = $this->con->getConn();
	}


	public function cadastrar(ModelCategorias $Tipo)
		{
			try {
				$query = "INSERT INTO `Tipos`(`nome`,`descricao`,`img`) 
				VALUES(:nome, :descricao,:img);";
				$stmt = $this->con->prepare($query);
				$stmt->bindValue(':nome',$Tipo->getNome());
				$stmt->bindValue(':descricao',$Tipo->getDescricao());
				$stmt->bindValue(':img','');
				
				if($stmt->execute()){
					$stmt = $this->con->prepare("SELECT MAX(idTipo) AS id FROM `Tipos`");
					$stmt->execute();
					$resultado = $stmt->fetch(\PDO::FETCH_ASSOC);
					
					$Tipo = array("idTipo" => $resultado['id']);
					
					$data['success'] = true;
					$data['data'] = $Tipo;
				}
				else{
					$data['success'] = false;
					$data['data'] = $stmt->errorInfo();
				}
			} catch (Exception $e) {
				
				$data['success'] = false;
				$data['data'] = 'Error: '.$e->getMessage();
			}	
			
			//header("Content-Type: application/json; charset=UTF-8");
			return json_encode($data);
		}

		public function editar(ModelCategorias $Tipo)
		{
			try {
				$query = "UPDATE `Tipos` SET `nome`=:nome, `descricao`=:descricao WHERE `idTipo`=:id;";
				$stmt = $this->con->prepare($query);
				$stmt->bindValue(':nome',$Tipo->getNome());
				$stmt->bindValue(':descricao',$Tipo->getDescricao());
				$stmt->bindValue(':id',$Tipo->getId());
				
				if($stmt->execute()){
					$data['success'] = true;
					$data['data'] = "Atualizado com sucesso.";
				}
				else{
					$data['success'] = false;
					$data['data'] = $stmt->errorInfo();
				}
			} catch (Exception $e) {
				
				$data['success'] = false;
				$data['data'] = 'Error: '.$e->getMessage();
			}	
			
			//header("Content-Type: application/json; charset=UTF-8");
			return json_encode($data);
		}

	public function apagar($id)
	{
		try {
			$query = "DELETE FROM `Tipos` WHERE `idTipo`=:id;";
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
		} catch (Exception $e) {
			
			$data['success'] = false;
			$data['data'] = 'Error: '.$e->getMessage();
		}	
		
		//header("Content-Type: application/json; charset=UTF-8");
		return json_encode($data);
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
	
	
	
	public function getTipo($tipo)
	{
		try {
			$query = "SELECT * FROM Tipos WHERE idTipo = :tipo";
			$stmt = $this->con->prepare($query);
			$stmt->bindValue(':tipo',$tipo);
			$stmt->execute();
			while($resultado = $stmt->fetch(\PDO::FETCH_ASSOC)){
				$tip = array(
					"nome" => $resultado['nome'],
					"descricao" => $resultado['descricao'],
					"img" => $resultado['img']
				);
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

	public function setImgName($id,$imgName){
			
		try {
			$query = "UPDATE `Tipos` SET `img` = :img WHERE idTipo = :id;";
			$stmt = $this->con->prepare($query);
			
			$stmt->bindValue(':id',$id);
			$stmt->bindValue(':img',$imgName);
			
			if($stmt->execute()){
				return true;
			}
		} catch (Exception $e) {
			return false;
		}	
	}
}

?>