<?php 
namespace App\Controller;
use Classes\Render;
class ErrorController extends Render
{

	function __construct()
	{

		$this->setTitle("Error"); 
		$this->setDescritpion("Pagina error");
		$this->setKeywords("Error");
		$this->setDir("Error/"); 
		$this->renderLayout();
	}
}


?>