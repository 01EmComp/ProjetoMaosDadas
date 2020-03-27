<?php 
namespace App\lib\Database;
use PDO;
class Connection
{

	private $host;
	private $db_name;
	private $username;
	private $password;
	public $conn;
	function __construct()
	{
		$this->host = "localhost";
		$this->db_name = "projetoMaosDadas";
		$this->username = "root";
		$this->password = "";
		self::getConn();
	}
	public  function getConn(){
		if ($this->conn == NULL) {
			
			$this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db_name.";charset=utf8",$this->username,$this->password);

		}

		return $this->conn;
	}
}



?>