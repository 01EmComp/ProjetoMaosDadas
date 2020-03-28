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
		$cidades = $cidades->selectCidades();
		$resultado = '';
		
		foreach ($cidades['data'] as $key => $value) {

			$resultado = $resultado.
			'
			<div class="card h-100">
			<div class="img-container">
			<a href="cidade/select/'.$value->getIdCidade().'">
			<img class="card-img-top" src="'.DIRIMG.'cidades/'.$value->getImg().'" alt="'.$value->getNome().'"/>
			</a>
			</div>
			<br/>
			</div>';
		}
		echo $resultado;
	}

}

?>