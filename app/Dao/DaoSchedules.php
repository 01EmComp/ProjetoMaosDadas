<?php 
namespace App\Dao;
use App\Model\ModelSchedules;
use App\lib\Database\Connection;
/**
 * 
 */
class DaoSchedule extends ModelSchedules
{
	private $con;

	function __construct()
	{
		$con = new Connection;
		$con = $con->getConn();
	}
	public function selectAll()
	{
		$query = "SELECT * FROM schedules";
		$stmt = $con->execute($query);
		$schedules = new ModelSchedules;
	}
}



?>