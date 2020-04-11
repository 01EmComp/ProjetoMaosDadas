<?php 

namespace App\Controller;
use Classes\Render;
use App\Dao\DaoCidades;
use App\Dao\DaoProdutores;
use App\Dao\DaoTipos;
use App\Cores\Params;

/**
*
*/
class ProdutoresController extends Render
{
	
	private $idTipo;
	private $idCidade;
	function __construct()
	{
		session_start();
		
		$p = new Params();
		$this->idTipo = $p->getParam()[0]; 
		$this0->idCidade = $_SESSION['idCidade'];
		$this->setTitle("Produtores"); 
		$this->setDescritpion("Pagina produtores");
		$this->setKeywords("Produtores");
		$this->setDir("Produtores/"); 
		$this->renderLayout();
		
	}
	
	public function tipo($tipo)	{
		$_SESSION['idTipo'] = $tipo;
	}
	public function getNomeTipo()
	{
		
		$tipo = new DaoTipos();
		$tipo = $tipo->getTipo($this->idTipo);
		$tipo =json_decode($tipo);
		if ($tipo->success) {
			echo $tipo->data->nome;
		}
		else{
			echo $tipo->message;
		}
	}
	public function selectProdutores()
	{
		if (isset($_SESSION['idCidade'])) {
			$tipo = $_SESSION['idTipo'];
			$cidade = $_SESSION['idCidade'];
			$produtores = new DaoProdutores();
			$produtores = json_decode($produtores->selectProdutores($tipo,$cidade));
			if ($produtores->success) {
				
				$i = 0;
				$result = "";
				foreach ($produtores->data as $key => $value) {
					
					$i++;
					$result = $result.
					'
					<div class="col-lg-4 col-md-6 mb-4">
					<div class="card-produtor" onclick="buscaProdutor('.$value->idProdutor.')" style="border-width:4px;">
					<div class="card h-100">
					<div class="img-container">
					<span>
					<img class="card-img-top" src="'.DIRIMG.'produtores/'.$value->img.'" alt="'.$value->descricao.'" style="z-indez:0;"/>
					</span>
					<p class="img-text">
					'.$value->descricao.'
					</p>
					</div>
					</div>
					<div class="card-body">
					<h5 class="card-title">		
					'.$value->nome.'
					</h5>
					<p>
					Valores a serem consultados com o vendedor
					</p>
					</div>
					<a class="list-group-item" href="https://api.whatsapp.com/send?phone='.$value->whatsapp.'
					&text==Ol%C3%A1%2C%20tudo%20bem%3F%20Quero%20comprar%3A" target="_blank">
					<div class="card-footer">
					<img class="card-img-top" src="'.DIRIMG.'wpp.png" alt="">
					</div>
					</a>
					</div>
					</div>
					';
				}
			}
			else{
				$result = $produtores['message'];
				
			}
			echo $result;
		}
	}
	
	public function getMenu(){
		
		$tips = new DaoTipos;
		$tips= json_decode($tips->selectTiposCidade($this->idCidade));
		var_dump($tips);
		$result = "";
		foreach ($tips->data as $key => $value) {
			$result = $result.
			'
			<a href="'.DIRPAGE.'produtores/tipo/'.$value->id.'">
			'.$value->nome.$this->idCidade.'
			</a>';
		}

		echo $result;
		
	}
	
}

?>