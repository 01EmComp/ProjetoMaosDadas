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
		$i = 0;
		foreach ($cidades->data as $key => $value) {

			if ($i == 2) {
				$col1 = '<div class="col-lg-4 col-md-6 mb-4">';
				$col2= '</div>';
				$i =0;
			}
			else{
				$col1 ='';
				$col2 = '';

			}
			$i++;

			$resultado = $resultado
			.$col1.'
			<div class="card h-100">
				<div class="img-container">
					<a href="cidade/select/'.$value->id.'">
						<img class="card-img-top" src="'.DIRIMG.$value->img.'" alt="'.$value->nome.'"/>
					</a>
				</div>
				<br/>
			</div>'.$col2;
		}
		echo $resultado;
	}

}

?>