<?php 
namespace App\Controller;
use Classes\Render;
use App\Dao\DaoCidades;
use App\Dao\DaoTipos;

class CityController extends Render
{
	
	function __construct()
	{
		session_start();
		$this->setTitle("Cidades"); 
		$this->setDescritpion("Pagina cidades");
		$this->setKeywords("Cidades");
		$this->setDir("Cidade/"); 
		$this->renderLayout();
	}
	public function select($city){
		
		$_SESSION['idCidade'] = $city;
		$cidade = new DaoCidades;
		$name = json_decode($cidade->getName($city));
		return $name->data->nome;
	}
	public function tips()
	{
		$tips = new DaoTipos;
		$tips= json_decode($tips->selectTips());

		$result = "";
		foreach ($tips->data as $key => $value) {
			$result = $result.
			'
			<div class="col-lg-4 col-md-6 mb-4">
			<div class="card h-100">
			<div class="img-container">
			<a href="'.DIRPAGE.'produtores/tipo/'.$value->id.'">
			<img class="card-img-top" src="'.DIRIMG.'tipos/'.$value->img.'" alt="'.$value->nome.'"/>
			</a>
			</div>
			</div>
			</div>';
		}
		echo $result;

	}
	public function getNomeCidade()
	{
		if (isset($_SESSION['idCidade'])) {
			$cidade = new DaoCidades();
			$nome = json_decode($cidade->getNome($_SESSION['idCidade']));
			echo $nome->data->nome;
		}
	}

}

?>