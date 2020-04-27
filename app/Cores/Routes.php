<?php 
/**
* 
*/
use App\Cores\UrlTrait;
namespace App\Cores;
class Routes extends UrlTrait
{
	private $url;
	private $routes;
	
	public function getParamRoute()
	{
		$this->url = new UrlTrait();
		$index = $this->url->traitUrl();
		return $index;
	}
	public function getRoute()
	{
		$this->routes = array("" => "HomeController",
		"home"=>"HomeController", 
		"cidade"=>"CityController",
		"produtores" => "ProdutoresController",
		"login" => "LoginController",
		"administracao" => "AdministracaoController",
		"session" => "SessionController",
		"crudprodutores" => "CrudProdutoresController",
		"crudcidades" => "CrudCidadesController",
		"crudcategorias" => "CrudCategoriasController",
		"filtro" => "FiltroController",
		"contato" =>"ContatoController",
		"api" => "ApiController",
		"politicas" => "PoliticasController"
	);
	$this->url = new UrlTrait();
	$index = $this->url->traitUrl();
	$aux = $index[0];
	
	if (array_key_exists($aux, $this->routes)) {
		if (file_exists("app/Controller/".$this->routes[$aux].".php")) {
			return $this->routes[$aux];
		}	
		else{
			return "ErrorController";
		}
	}
	else{
		return "ErrorController";
	}
}
}
?>