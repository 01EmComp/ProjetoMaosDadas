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
}

?>