<?php 
namespace App\Cores;

class Dispatch extends Routes 
{
	private $method;
	private $param=[];
	private $obj;

	function __construct()
	{
		$this->method = "";
		self::addController();

	}
	public function setMethod($method)
	{
		$this->method = $method;
	}
	protected function getMethod()
	{
		return $this->method;
	}
	public function setParam($param)
	{
		$this->param = $param;
	}
	public function getParam()
	{
		return $this->param;
	}
	private function addController()
	{
		$route = $this->getRoute();
		$nameS = "App\\Controller\\{$route}";
		$this->obj = new $nameS;
		if (isset($this->traitUrl()[1])) {
				self::addMethod();
		}
	}
	private function addMethod(){
		if (method_exists($this->obj,$this->traitUrl()[1])) {
			$this->setMethod($this->traitUrl()[1]);
			self::addParam();
			call_user_func_array([$this->obj,$this->getMethod()],$this->getParam());
		}

	}
	public function addParam(){
		$countArray = count($this->traitUrl()); 
		if ($countArray >2) {
			foreach ($this->traitUrl() as $key => $value) {
				if ($key >1) {
					$this->setParam($this->param += [$key => $value]);
				}
			}
		}
	}

}
?>