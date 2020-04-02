<?php 
use App\Cores\Routes;
namespace App\Cores;
class Params extends Routes
{

    function __construct()
    {
       self::getParams();
    }

    private $params = [];
    private $routes;

	public function setParams($param)
	{
		 array_push($this->params,$param);
	}
	public function getParam()
	{
		return $this->params;
	}

    private function getParams(){
        $countArray = count($this->traitUrl()); 
        if ($countArray >2) {
            foreach ($this->getParamRoute() as $key => $value) {
                if ($key >1) {
                   
                    $this->setParams(array_push($this->params, $value));
                }
            }
        }
    }
}