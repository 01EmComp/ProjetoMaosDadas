<?php 
namespace Classes;

class Captcha
{
	public function validate($captcha)
	{
	
	//Verifiva junto a google se o usuario acertou o desafio
	$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".PrivKey."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
	$response = json_decode($response);
	//se sim retorna true
	if ($response->success) {
		return true;
	} 
	//se não retorna false
	else{
		return false;
	}
	
}
}

?>