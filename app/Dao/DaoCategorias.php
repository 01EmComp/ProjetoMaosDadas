<?php 
namespace App\Dao;
use App\lib\Database\Connection;
use App\Model\ModelCategorias;

class DaoCategorias {
	
	private $con;
	
	function __construct(){
		$this->con = new Connection();
		$this->con = $this->con->getConn();
	}


	public function cadastrar(ModelCategorias $categoria)
	{
		try {
			$query = "INSERT INTO `Categorias`(`nome`,`descricao`,`img`,`icon`) 
			VALUES(:nome, :descricao,:img,:icon);";
			$stmt = $this->con->prepare($query);
			$stmt->bindValue(':nome',$categoria->getNome());
			$stmt->bindValue(':descricao',$categoria->getDescricao());
			$stmt->bindValue(':img','');
			$stmt->bindValue(':icon',$categoria->getIcon());
			
			if($stmt->execute()){
				$stmt = $this->con->prepare("SELECT MAX(idCategoria) AS id FROM `Categorias`");
				$stmt->execute();
				$resultado = $stmt->fetch(\PDO::FETCH_ASSOC);
				
				$categoria = array("idCategoria" => $resultado['id']);
				
				$data['success'] = true;
				$data['data'] = $categoria;
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

	public function editar(ModelCategorias $categoria)
	{
		try {
			$query = "UPDATE `Categorias` SET `nome`=:nome, `descricao`=:descricao,
			`icon`=:icon WHERE `idcategoria`=:id;";

			$stmt = $this->con->prepare($query);

			$stmt->bindValue(':nome',$categoria->getNome());
			$stmt->bindValue(':descricao',$categoria->getDescricao());
			$stmt->bindValue(':id',$categoria->getId());
			$stmt->bindValue(':icon',$categoria->getIcon());

			if($stmt->execute()){
				$data['success'] = true;
				$data['data'] = "Atualizado com sucesso.";
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

	public function apagar($id)
	{
		try {
			$query = "DELETE FROM `Categorias` WHERE `idCategoria`=:id;";
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
	public function selectCategoriasCidade($idCidade){
		try {
			$query = "SELECT DISTINCT(idCategoria) AS idCategoria,`nome`, `descricao`,`icon` FROM
			`VisaoFiltroCidadeCategorias` WHERE idCidade = :idCidade";
			$stmt = $this->con->prepare($query);
			$stmt->bindValue(':idCidade',$idCidade);
			$stmt->execute();
			$tips = array();
			while($resultado = $stmt->fetch(\PDO::FETCH_ASSOC)){
				$tip = array("id" => $resultado['idCategoria'],
					"nome" => $resultado['nome'], 
					"descricao" => $resultado['descricao'],
					"icon" => $resultado['icon']
				);
				array_push($tips, $tip);
			}
			
			$data['success'] = true;
			$data['data'] = $tips;
			
		} catch (\Exception $e) {
			
			$data['success'] = false;
			$data['data'] = 'Error: '.$e->getMessage();
		}
		return $data;
	}
	
	public function selectCategorias(){
		try {
			$query = "SELECT * FROM Categorias";
			$stmt = $this->con->prepare($query);

			$stmt->execute();
			$tips = array();
			while($resultado = $stmt->fetch(\PDO::FETCH_ASSOC)){
				$tip = array("idCategoria" => $resultado['idCategoria'],
					"nome" => $resultado['nome'],
					"icon" => $resultado['icon']
				);
				array_push($tips, $tip);
			}
			
			$data['success'] = true;
			$data['data'] = $tips;
			
		} catch (\Exception $e) {
			
			$data['success'] = false;
			$data['data'] = 'Error: '.$e->getMessage();
		}

		return $data;
	}
	
	
	
	public function selectCategoria($idCategoria)
	{
		try {
			$query = "SELECT * FROM Categorias WHERE idCategoria = :categoria";
			$stmt = $this->con->prepare($query);
			$stmt->bindValue(':categoria',$idCategoria);
			$stmt->execute();
			while($resultado = $stmt->fetch(\PDO::FETCH_ASSOC)){
				$tip = array(
					"nome" => $resultado['nome'],
					"descricao" => $resultado['descricao'],
					"img" => $resultado['img'],
					"icon" => $resultado['icon']
					
				);
			}
			
			$data['success'] = true;
			$data['data'] = $tip;
			
		} catch (\Exception $e) {
			
			$data['success'] = false;
			$data['data'] = 'Error: '.$e->getMessage();
		}
		
		return $data;
	}

	public function setImgName($id,$imgName){
		
		try {
			$query = "UPDATE `Categorias` SET `img` = :img WHERE idCategoria = :id;";
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