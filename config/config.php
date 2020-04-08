<?php 
#arquivos diretorios raizes
$pastaInterna ="";
//nome do sistema
define('NAME', 'Mãos dadas');

define('DIRPAGE', "http://{$_SERVER['HTTP_HOST']}/{$pastaInterna}");
if (substr($_SERVER['DOCUMENT_ROOT'],-1)== '/') {
	define('DIREQ', "{$_SERVER['DOCUMENT_ROOT']}{$pastaInterna}");
}
else{
	define('DIREQ', "{$_SERVER['DOCUMENT_ROOT']}/{$pastaInterna}");
}

#chaves recaptcha emcomp
define('PrivKey','6Le_VOUUAAAAAONPjXkSrJrWUY0Gpkd6o2TKPWTc');
define('PubKey','6Le_VOUUAAAAAPhybnXynayfpSodILffMvdraUiR');


#diretorios especificos
define('DIRIMG', "http://{$_SERVER['HTTP_HOST']}/{$pastaInterna}public/img/");
define('DIRCSS', "http://{$_SERVER['HTTP_HOST']}/{$pastaInterna}public/css/");
define('DIRJS', "http://{$_SERVER['HTTP_HOST']}/{$pastaInterna}public/js/");



 ?>