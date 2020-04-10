<?php 
namespace App\Controller;
use Classes\Render;
class ContatoController extends Render
{

	function __construct()
	{

		$this->setTitle("Contato"); 
		$this->setDescritpion("Contato");
		$this->setKeywords("Error");
		$this->setDir("Contato/"); 
		$this->renderLayout();
	}
}


?>