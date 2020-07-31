<?php

namespace App\Dao;

use App\lib\Database\Connection;
use App\Model\ModelNegocio;

/**
 * 
 */
class DaoNegocio
{
	private $con;
	private $negocio;

	function __construct()
	{
		$this->con = new Connection;
		$this->con = $this->con->getConn();
		$this->negocio = new ModelNegocio;
	}
	/*
	private function setResultToModel($stmt){
				$negocios = array();
			while($resultado = $stmt->fetch(\PDO::FETCH_ASSOC)){
				$this->negocio->setid();
				$this->negocio->setIdCidade();
				$this->negocio->setIdUsuario();
				$this->negocio->setNomeNegocio();
				$this->negocio->setWhatsapp();
				$this->negocio->setEndereco();
				$this->negocio->setFormaEntrega();
				$this->negocio->setFormaPagamento();
				$this->negocio->setImg();
				$this->negocio->setDescricao();
				$this->negocio->setKeyWords();
*/
	private function resultToArray($stmt)
	{

		$negocios = array();
		while ($resultado = $stmt->fetch(\PDO::FETCH_ASSOC)) {
			$negocio = array(
				"idNegocio" => $resultado['idNegocio'],
				"idUsuario" => $resultado['idUsuario'],
				"nomeNegocio" => $resultado['nomeNegocio'],
				"nomeCidade" => $resultado['nomeCidade'],
				"endereco" => $resultado['endereco'],
				"whatsapp" => $resultado['whatsapp'],
				"descricao" => $resultado['descricao'],
				"formaPagamento" => $resultado['formaPagamento'],
				"formaEntrega" => $resultado['formaEntrega'],
				"keyWords" => $resultado['keyWords'],
				"idCategoria" => $resultado['idCategoria'],
				"nomeCategoria" => $resultado['nomeCategoria'],
				"iconeCategoria" => $resultado['icon'],
				"img" => $resultado['img']
			);
			array_push($negocios, $negocio);
		}
		return $negocios;
	}


	public function selectNegociosCategorias($cidade, $tipo)
	{

		try {
			$query = "SELECT `img`, `idProdutor`, `nomeNegocio`, `nomeSocial`, 
			`whatsapp`, `endereco`, `descricao`, `formaPagamento`,`formaEntrega`, 
			`keyWords`, `nomeCidade`, `idTipo`,`nomeTipo`,`icon` FROM `VisaoGeralTiposProdutores` 
			WHERE idTipo = :tipo AND idCidade = :cidade ORDER BY nomeNegocio ASC";
			$stmt = $this->con->prepare($query);
			$stmt->bindValue(':tipo', $tipo);
			$stmt->bindValue(':cidade', $cidade);
			$stmt->execute();

			$data['success'] = true;
			$data['data'] = $this->resultToArray($stmt);
		} catch (\Exception $e) {

			$data['success'] = false;
			$data['data'] = 'Error: ' . $e->getMessage();
		}
		//header("Content-Type: application/json; charset=UTF-8");
		return json_encode($data, JSON_PRETTY_PRINT);
	}

	public function selectNegociosCidade($cidade)
	{

		try {
			$query = "SELECT  DISTINCT idNegocio,`nomeNegocio`,`idUsuario`,
			`whatsapp`, `endereco`, `descricao`, `formaPagamento`, `formaEntrega`,
			`keyWords`, `nomeCidade`, `idCategoria`, `idCidade`,`img`,`nomeCategoria`,`icon` FROM 
			`VisaoGeralTiposProdutores`
		   WHERE idCidade = :cidade ORDER BY RAND()";
			$stmt = $this->con->prepare($query);
			$stmt->bindValue(':cidade', $cidade);
			$stmt->execute();


			$data['success'] = true;
			$data['data'] = $this->resultToArray($stmt);
		} catch (\Exception $e) {

			$data['success'] = false;
			$data['data'] = 'Error: ' . $e->getMessage();
		}
		return $data;
	}



	public function selectTodosNegocios()
	{

		try {
			$query = "SELECT * FROM VisaoGeralTiposProdutores ORDER BY nomeNegocio ASC";
			$stmt = $this->con->prepare($query);

			if ($stmt->execute()) {
				$data['success'] = true;
				$data['data'] = $this->resultToArray($stmt);
			} else {
				$data['success'] = false;
				$data['data'] = 'Erro ao buscar comprador';
				$data['msg'] = $stmt->errorinfo();
			}
		} catch (\Exception $e) {

			$data['success'] = false;
			$data['data'] = 'Error: ' . $e->getMessage();
		}
		//header("Content-Type: application/json; charset=UTF-8");
		return json_encode($data, JSON_PRETTY_PRINT);
	}



	public function selectNegocio($idNegocio)
	{

		try {
			$query = "SELECT * FROM VisaoGeralTiposProdutores WHERE 
			idUsuario = :produtor";
			$stmt = $this->con->prepare($query);

			$stmt->bindValue(':produtor', $idNegocio);
			$stmt->execute();
			if ($stmt->rowCount() == 1) {
				$data['success'] = true;
				$data['data'] = $this->resultToArray($stmt);

			} else {
				$data['success'] = false;
				$data['data'] = 'O produtor não tem nenhum negócio cadastrado';
			}
		} catch (\Exception $e) {

			$data['success'] = false;
			$data['data'] = 'Error: ' . $e->getMessage();
		}
		//header("Content-Type: application/json; charset=UTF-8");
		return json_encode($data, JSON_PRETTY_PRINT);
	}


	public function cadastrar(ModelNegocio $negocio)
	{
		try {
			$query = "INSERT INTO `Negocios`(`idUsuario`, `idCidade`, `nomeNegocio`,`whatsapp`, `endereco`,
			 `formaEntrega`, `formaPagamento`, `descricao`, `keyWords`) 
			VALUES (:idUsuario, :idCidade, :nome,:whatsapp, :endereco, :pagamento, :entrega,
			 :descricao,:keywords)";
			$stmt = $this->con->prepare($query);

			$stmt->bindValue(':idCidade', $negocio->getIdCidade());
			$stmt->bindValue(':nome', $negocio->getNomeNegocio());
			$stmt->bindValue(':whatsapp', $negocio->getWhatsapp());
			$stmt->bindValue(':pagamento', $negocio->getFormaPagamento());
			$stmt->bindValue(':endereco', $negocio->getEndereco());
			$stmt->bindValue(':entrega', $negocio->getFormaEntrega());
			$stmt->bindValue(':descricao', $negocio->getDescricao());
			$stmt->bindValue(':keywords', $negocio->getKeyWords());

			if ($stmt->execute()) {
				$query = "SELECT MAX(idNegocio) AS id FROM Negocios";
				$stmt = $this->con->prepare($query);
				$stmt->execute();

				if ($resultado = $stmt->fetch(\PDO::FETCH_ASSOC)) {
					$result = array("idNegocio" => $resultado['id']);

					if ($this->negocioCategoria($resultado['id'], $negocio->getIdCategoria())) {
						$data['success'] = true;
						$data['data'] = $result;

					} else {
						$data['success'] = true;
						$data['data'] = array("msg" => "Erro ao adcionar tipo");
					}
				} else {
					$data['success'] = true;
					$data['data'] = array("msg" => "Erro ao pegar id");
				}
			}
		} catch (\Exception $e) {
			$data['success'] = true;
			$data['data'] = array("msg" => $e->getMessage());
		}
		return json_encode($data);
	}



	public function editar(ModelNegocio $negocio)
	{
		try {
			$query = "UPDATE `Negocios` SET 
			`idCidade`= :idCidade,
			`nomeNegocio`=:nome,
			`whatsapp`=:whatsapp,
			`endereco`=:endereco,
			`formaPagamento`=:pagamento,
			`formaEntrega`=:entrega,
			`keyWords`=:keywords,
			`descricao`=:descricao WHERE `idNegocio` = :idNegocio";
			$stmt = $this->con->prepare($query);

			$stmt->bindValue(':idCidade', $negocio->getIdCidade());
			$stmt->bindValue(':nome', $negocio->getNomeNegocio());
			$stmt->bindValue(':whatsapp', $negocio->getWhatsapp());
			$stmt->bindValue(':pagamento', $negocio->getFormaPagamento());
			$stmt->bindValue(':endereco', $negocio->getEndereco());
			$stmt->bindValue(':entrega', $negocio->getFormaEntrega());
			$stmt->bindValue(':descricao', $negocio->getDescricao());
			$stmt->bindValue(':keywords', $negocio->getKeyWords());
			$stmt->bindValue(':idNegocio', $negocio->getId());

			if ($stmt->execute()) {

				if ($this->editaNegocioCategoria($negocio->getId(), $negocio->getIdCategoria())) {
					$data['success'] = true;
					$data['msg'] = "Produtor editado com sucesso";
				} else {
					$data['success'] = true;
					$data['data'] = array("msg" => "Erro ao editar tipo");
				}
			}
		} catch (\Exception $e) {
			$data['success'] = true;
			$data['data'] = array("msg" => $e->getMessage());
		}
		return json_encode($data);
	}

	private function negocioCategoria($idNegocio, $idCategoria)
	{
		try {
			$query = "INSERT INTO `CategoriaNegocios`(`idNegocio`, `idCategoria`) 
			VALUES (:negocio,:categoria)";
			
			$stmt = $this->con->prepare($query);
			$stmt->bindValue(':negocio', $idNegocio);
			$stmt->bindValue(':categoria', $idCategoria);

			if ($stmt->execute()) {
				return true;
			} else {
				return false;
			}
		} catch (\Exception $e) {

			return false;
		}
	}

	public function editaNegocioCategoria($idNegocio, $idCategoria)
	{
		try {
			$query = "UPDATE  `CategoriaNegocios` SET `idCategoria`= :categoria WHERE `idNe$idNegocio` = :negocio";
			$stmt = $this->con->prepare($query);

			$stmt->bindValue(':negocio', $idNegocio);
			$stmt->bindValue(':categoria', $idCategoria);

			if ($stmt->execute()) {
				return true;
			} else {
				return false;
			}
		} catch (\Exception $e) {

			return false;
		}
	}
	public function apagar($id)
	{
		try {
			$query = "DELETE FROM `Produtores` WHERE `idProdutor`=:id;";
			$stmt = $this->con->prepare($query);

			$stmt->bindValue(':id', $id);

			if ($stmt->execute()) {

				$data['success'] = true;
				$data['data'] = "Apagado com sucesso.";
			} else {
				$data['success'] = false;
				$data['data'] = $stmt->errorInfo();
			}
		} catch (\Exception $e) {

			$data['success'] = false;
			$data['data'] = 'Error: ' . $e->getMessage();
		}

		//header("Content-Type: application/json; charset=UTF-8");
		return json_encode($data);
	}


	private function apagarCategoriaNegocio($id)
	{
		try {
			$query = "DELETE FROM `CategoriaNegocio` WHERE `idNegocio`=:id;";
			$stmt = $this->con->prepare($query);

			$stmt->bindValue(':id', $id);

			if ($stmt->execute()) {
				return true;
			} else {
				return false;
			}
		} catch (\Exception $e) {

			return false;
		}
	}

	public function setImgName($id, $imgName)
	{

		try {
			$query = "UPDATE `Negocios` SET `img` = :img WHERE idNegocio = :id;";
			$stmt = $this->con->prepare($query);

			$stmt->bindValue(':id', $id);
			$stmt->bindValue(':img', $imgName);

			if ($stmt->execute()) {
				return true;
			}
		} catch (\Exception $e) {
			return false;
		}
	}
}
