<?php 
namespace App\Controller;
use Classes\Render;
class ErrorController extends Render
{
	function __construct()
	{
		$this->setTitle("Error"); 
		$this->setDescritpion("Pagina Error");
		$this->setKeywords("error");
		$this->setDir("Error/"); 
		$this->renderLayout();
	}

}

?>