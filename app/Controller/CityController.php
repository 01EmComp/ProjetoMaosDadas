<?php 
namespace App\Controller;
use Classes\Render;
class CityController extends Render
{
	private $idCidade;
	
	function __construct()
	{
		$this->setTitle("Cidades"); 
		$this->setDescritpion("Pagina cidades");
		$this->setKeywords("Cidades");
		$this->setDir("Cidade/"); 
		$this->renderLayout();
	}
	
}
