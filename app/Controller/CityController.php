<?php 
namespace App\Controller;
use Classes\Render;
use App\Dao\DaoCidades;

class CityController extends Render
{
	
	function __construct()
	{

		$this->setTitle("Home"); 
		$this->setDescritpion("Pagina Home");
		$this->setKeywords("home");
		$this->setDir("Cidade/"); 
		$this->renderLayout();
	}
	public function select($city)
	{
		
	}

}

?>