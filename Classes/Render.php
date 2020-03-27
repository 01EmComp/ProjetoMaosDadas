<?php 
/**
 * 
 */
namespace Classes;
class Render
{
	private $dir;
	private $title;
	private $description;
	private $keywords;

	public function getDir()
	{
		return $this->dir;
	}
	public function setDir($dir)
	{
		$this->dir = $dir ;
	}
	public function getTitle()
	{
		return $this->title;
	}
	public function setTitle($title)
	{
		$this->title = $title;
	}
	public function getDescription()
	{
		return $this->description;
	}
	public function setDescritpion($desc)
	{
		$this->description = $desc ;
	}
	public function getKeywords()
	{
		return $this->keywords;
	}
	public function setKeywords($keyw)
	{
		$this->keywords = $keyw ;
	}
	function __construct()
	{
		# code...
	}
	#metodo de renderizar todo o layout
	public function renderLayout()
	{
		include_once("app/Templates/structure.php");
	}
	#metodo adciona caracteristicas especificas no head
	public function addHead()
	{
		if (file_exists(DIREQ."app/View/".$this->getDir()."head.php")) {
			include DIREQ."app/View/".$this->getDir()."head.php";	
		}
	}
	public function addNav()
	{
		if (file_exists(DIREQ."app/View/nav.php")) {
			include DIREQ."app/View/nav.php";	
		}

	}
	public function addHeader()
	{
		if (file_exists(DIREQ."app/View/".$this->getDir()."header.php")) {
			include DIREQ."app/View/".$this->getDir()."header.php";	
		}
	}
	#metodo adciona caracteristicas especificas no main
	public function addMain()
	{
		if (file_exists(DIREQ."app/View/".$this->getDir()."main.php")) {
			include DIREQ."app/View/".$this->getDir()."main.php";	
		}
		
	}
	#metodo adciona caracteristicas especificas no footer
	public function addFooter()
	{
		if (file_exists(DIREQ."app/View/".$this->getDir()."foot.php")) {
			include DIREQ."app/View/".$this->getDir()."foot.php";	
		}
	}
	#metodo para corrigir jsons
	public function raw_json_encode($input, $flags = 0) {
		$fails = implode('|', array_filter(array(
			'\\\\',
			$flags & JSON_HEX_TAG ? 'u003[CE]' : '',
			$flags & JSON_HEX_AMP ? 'u0026' : '',
			$flags & JSON_HEX_APOS ? 'u0027' : '',
			$flags & JSON_HEX_QUOT ? 'u0022' : '',
		)));
		$pattern = "/\\\\(?:(?:$fails)(*SKIP)(*FAIL)|u([0-9a-fA-F]{4}))/";
		$callback = function ($m) {
			return html_entity_decode("&#x$m[1];", ENT_QUOTES, 'UTF-8');
		};
		return preg_replace_callback($pattern, $callback, json_encode($input, $flags));
	}
}



?>