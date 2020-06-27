<?php 
namespace App\Controller;
use Classes\Render;
class SobreController extends Render
{

	function __construct()
	{

		$this->setTitle("Sobre Nós"); 
		$this->setDescritpion("Sobre");
		$this->setKeywords("Sobre");
		$this->setDir("Sobre/"); 
		$this->renderLayout();
	}
}


?>