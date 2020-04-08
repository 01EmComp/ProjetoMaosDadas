<?php 
namespace App\Controller;
use Classes\Render;
use App\Dao\DaoCidades;

class HomeController extends Render
{
	
	function __construct()
	{
		if(isset($_SESSION)){
			session_destroy();
		}
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
			<a href="'.DIRPAGE.'cidade/select/'.$value->idCidade.'">
			<div class="card h-100">
			<div class="img-container">
			<span class="img-mask">'.$value->nome.'</span>
			<div>
			<img  class="card-img-top" src="'.DIRIMG.'cidades/'.$value->img.'"
			 alt="'.$value->nome.'""/>
			</div>
			</div>
			</div>
			</a>
			</div>';
		}
		echo $resultado;
	}


}

?>