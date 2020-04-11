<?php 
namespace App\Controller;
use Classes\Render;
use App\Dao\DaoCidades;
use App\Dao\DaoTipos;
use App\Dao\DaoProdutores;
use App\Cores\Params;
class CityController extends Render
{
	private $idCidade;
	
	function __construct()
	{
		session_start();
		
		$p = new Params();
		$this->idCidade = $p->getParam()[0];
		$this->setTitle("Cidades"); 
		$this->setDescritpion("Pagina cidades");
		$this->setKeywords("Cidades");
		$this->setDir("Cidade/"); 
		$this->renderLayout();
	}
	
	public function getIdCidade()
	{
		return $this->idCidade;
	}
	
	public function select($city){
		$_SESSION['idCidade'] = $city;		
		$cidade = new DaoCidades;
		$name = json_decode($cidade->getNome($city));
		return $name->data->nome;
	}

	public function getProdutores(){
			$produtores = new DaoProdutores();
			$produtores = json_decode($produtores->selectProdutores($this->idCidade));
			if ($produtores->success) {
				
				$result = "";
				foreach ($produtores->data as $key => $value) {
					$descricao = "";
					if(strlen($value->descricao)>66){
						$descricao = substr($value->descricao,0,66)."...";
					}
					else{
						$descricao = $value->descricao;
					}
					$result = $result.
					'
					<div class="col-lg-4 col-md-6 mb-4 cardProd" data="tipo:'.$value->idTipo.',cidade:'.$this->idCidade.'">
					<div class="card-produtor" onclick="buscaProdutor('.$value->idProdutor.')">
					<div class="card h-100">
					<div class="img-container">
					<span>
					<img class="card-img-top" src="'.DIRIMG.'produtores/'.$value->img.'" alt="'.$value->descricao.'
					"style="z-indez:0; display:table;"/>
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
					'.$descricao.'
					</p>
					</div>
					<a class="list-group-item" href="https://api.whatsapp.com/send?phone='.$value->whatsapp.'
					&text=Ol%C3%A1%2C%20tudo%20bem%3F%20Quero%20comprar%3A" target="_blank">
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

	public function getMenu(){
		
		$tips = new DaoTipos;
		$tips= json_decode($tips->selectTiposCidade($this->idCidade));
		
		$result = "";
		foreach ($tips->data as $key => $value) {
			$json = '/{"tipo":"'
				.$value->id
				.'","cidade":"'
				.$this->idCidade
				.'"}/';
			$result = $result.
			'<div class="list-group-item item" data='.$json.'>'.$value->nome.'</div>';
		}
		$result = $result. 
		'<div class="list-group-item item" data=/{"tipo":"todos","cidade":"'.$this->idCidade.'"}/>
		Ver todos
		</div>';
		echo $result;
		
	}
	public function getNomeCidade()
	{
		$cidade = new DaoCidades();
		$nome = json_decode($cidade->selectCidade(self::getIdCidade()));
		echo $nome->data->nome;
		
	}
	
}

?>