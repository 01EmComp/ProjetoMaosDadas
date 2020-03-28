<?php 
namespace App\Controller;
use Classes\Render;
use App\Dao\DaoCidades;
class HomeController extends Render
{
	
	function __construct()
	{
		$this->setTitle("Home"); 
		$this->setDescritpion("Pagina Home");
		$this->setKeywords("home");
		$this->setDir("Home/"); 
		$this->renderLayout();

	}
	
	
	public function getCidades()
	{
		$cidades = new DaoCidades();
		$cidades = json_decode($cidades->selectCidades());
		$resultado = '';

		
		foreach ($cidades->data as $key => $value) {

			$resultado = $resultado.
			'
			<div class="col-lg-4 col-md-6 mb-4">
			<div class="card h-100">
			<div class="img-container">
			<a href="cidade/select/'.$value->idCidade.'">
			<img class="card-img-top" src="'.DIRIMG.'cidades/'.$value->img.'" alt="'.$value->nome.'"/>
			</a>
			</div>
			</div>
			</div>';
		}
		echo $resultado;
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