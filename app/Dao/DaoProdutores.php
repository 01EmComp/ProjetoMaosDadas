<?php 
namespace App\Dao;
use App\lib\Database\Connection;
use App\Model\ModelProdutor;

/**
* 
*/
class DaoProdutores 
{
	private $con;
	
	
	function __construct(){
		$this->con = new Connection;
		$this->con = $this->con->getConn();
	}
	
	public function selectProdutores($tipo, $cidade)
	{
		
		try {
			$query = "SELECT  DISTINCT idProdutor,`idTipo`, `idCidade`, `img`, `nome`, 
			`descricao`, `whatsapp` FROM VisãoGeralTiposProdutores 
			WHERE idTipo = :tipo AND idCidade = :cidade";
			$stmt = $this->con->prepare($query);
			$stmt->bindValue(':tipo',$tipo);
			$stmt->bindValue(':cidade',$cidade);
			$stmt->execute();
			$produtores = array();
			while($resultado = $stmt->fetch(\PDO::FETCH_ASSOC)){
				$produtor = array("idTipo" => $resultado['idTipo'],
				"idProdutor" => $resultado['idProdutor'], 
				"idCidade" => $resultado['idCidade'], 
				"nome" => $resultado['nome'], 
				"whatsapp" => $resultado['whatsapp'],
				"descricao" => $resultado['descricao'],
				"img" => $resultado['img']);
				array_push($produtores, $produtor);
			}
			
			$data['success'] = true;
			$data['data'] = $produtores;
			
		} catch (Exception $e) {
			
			$data['success'] = false;
			$data['data'] = 'Error: '.$e->getMessage();
		}
		//header("Content-Type: application/json; charset=UTF-8");
		return json_encode($data);
		
	}
	
	public function selectProdutor($idProdutor)
	{
		
		try {
			$query = "SELECT * FROM VisaoGeralPodutorCidade WHERE idProdutor = :produtor ";
			$stmt = $this->con->prepare($query);
			
			$stmt->bindValue(':produtor',$idProdutor);
			
			if($stmt->execute()){
				
				$resultado = $stmt->fetch(\PDO::FETCH_ASSOC);
				
				$produtor = array(
					"nomeProdutor" => $resultado['nomeProdutor'], 
					"nomeCidade" => $resultado['nomeCidade'], 
					"endereco" => $resultado['endereco'], 
					"whatsapp" => $resultado['whatsapp'],
					"descricao" => $resultado['descricao'],
					"formaPagamento" => $resultado['formaPagamento'],
					"formaEntrega" => $resultado['formaEntrega'],
					"nomeSocial" => $resultado['nomeSocial'],
					"img" => $resultado['img']
				);
				
				$data['success'] = true;
				$data['data'] = $produtor;
			}
			else{
				$data['success'] = false;
				$data['data']= 'Erro ao buscar comprador';
				$data['msg'] = $stmt->errorinfo();
			}
			
		} catch (Exception $e) {
			
			$data['success'] = false;
			$data['data'] = 'Error: '.$e->getMessage();
		}
		//header("Content-Type: application/json; charset=UTF-8");
		return json_encode($data);
		
	}
	
	
	public function cadastra(ModelProdutor $produtor){
		try {
			$query = "INSERT INTO `Produtores`(`idCidade`, `nome`, `nomeSocial`, `whatsapp`,
			`endereco`, `formaPagamento`, `formaEntrega`, `descricao`,`img`) 
			VALUES (:idCidade, :nome, :nomeSocial, :whatsapp, :endereco, :pagamento, :entrega, :descricao, :img)";
			$stmt = $this->con->prepare($query);
			
			$stmt->bindValue(':idCidade',$produtor->getIdCidade());
			$stmt->bindValue(':nome',$produtor->getNome());
			$stmt->bindValue(':nomeSocial',$produtor->getNomeSocial());
			$stmt->bindValue(':whatsapp',$produtor->getWhatsapp());
			$stmt->bindValue(':pagamento',$produtor->getFormaPagamento());
			$stmt->bindValue(':endereco',$produtor->getEndereco());
			$stmt->bindValue(':entrega',$produtor->getFormaEntrega());
			$stmt->bindValue(':descricao',$produtor->getDescricao());
			$stmt->bindValue(':img','');
			
			if($stmt->execute()){
				$query = "SELECT MAX(idProdutor) AS id FROM Produtores";
				$stmt = $this->con->prepare($query);
				$stmt->execute();
				
				if($resultado = $stmt->fetch(\PDO::FETCH_ASSOC)){
					$result = array("idProdutor"=>$resultado['id']);
					
					if($this->produtorTipo($resultado['id'],$produtor->getIdTipo())){
						
						$data['success'] = true;
						$data['data'] = $result;
					}
					else{
						$data['success'] = true;
						$data['data'] = array("msg"=>"Erro ao adcionar tipo");
					}
				}else{
					$data['success'] = true;
					$data['data'] = array("msg"=>"Erro ao pegar id");
				}
			}
		} catch (Exception $e) {
			$data['success'] = true;
			$data['data'] = array("msg"=>$e->getMessage());
		}
		return json_encode($data);
	}
	
	public function produtorTipo($idProdutor,$idTipo)
	{
		try {
			$query = "INSERT INTO `ProdutoresTipos`( `idProdutor`, `idTipo`) VALUES (:produtor,:tipo)";
			$stmt = $this->con->prepare($query);
			
			$stmt->bindValue(':produtor',$idProdutor);
			$stmt->bindValue(':tipo',$idTipo);
			
			if($stmt->execute()){
				return true;	
			}
			else{
				return false;
			}
			
		} catch (Exception $e) {
			
			return false;
		}
		
	}
	
	public function setImgName($id,$imgName){
		
		try {
			$query = "UPDATE `Produtores` SET `img` = :img WHERE idProdutor = :id;";
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