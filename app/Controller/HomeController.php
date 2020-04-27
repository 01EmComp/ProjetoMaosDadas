<?php 
namespace App\Controller;
use Classes\Render;
use App\Dao\DaoCidades;

class HomeController extends Render
{
	
	function __construct()
	{
		$desc="
		Se você quer comprar produtos locais, com Mãos Dadas encontre e entre em contato com os empreendedores inscritos de forma gratuita, negocie e compre.";
		$this->setTitle("Home"); 
		$this->setDescritpion($desc);
		$this->setKeywords("rio, pomba, maos, dadas, emcomp, projeto, produtores, dacg, knowhow, dacg");
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