<?php 
namespace App\Controller;
use Classes\Render;
use App\Dao\DaoCidades;
use App\Dao\DaoTips;

class CityController extends Render
{
	
	function __construct()
	{

		$this->setTitle("Cidades"); 
		$this->setDescritpion("Pagina cidades");
		$this->setKeywords("Cidades");
		$this->setDir("Cidade/"); 
		$this->renderLayout();
	}
	public function select($city){
		session_start();
		
		$cidade = new DaoCidades;
		$name = json_decode($cidade->getName($city));
		return $name->data->nome;
	}
	public function tips()
	{
		$tips = new DaoTips;
		$tips= json_decode($tips->selectTips());
		$i = 0;
		$result = "";
		foreach ($tips->data as $key => $value) {

			if ($i == 2) {
				$row1 = '<div class="row">';
				$row2= '</div>';
				$i =0;
			}
			else{
				$row1 ='';
				$row2 = '';

			}
			$i++;
			$result = $result.
			$row1.'
				<div class="col-lg-4 col-md-6 mb-4">
					<div class="card h-100">
						<div class="img-container">
							<a href="'.DIRPAGE.'produtores/tipo/'.$value->id.'">
								<img class="card-img-top" src="'.DIRIMG.$value->img.'" alt="'.$value->nome.'"/>
							</a>
						</div>
					</div
				</div>'
			.$row2
			;
		}
		echo $result;

	}

}

?>