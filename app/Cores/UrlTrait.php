<?php
/**
 * 
 */
namespace App\Cores;
class UrlTrait
{
	public function traitUrl(){

		return explode("/",rtrim($_GET['url']),FILTER_SANITIZE_URL);
	}
}


 ?>