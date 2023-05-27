<?php 
namespace app\database;

class Connection{
private $db_params;
	function __construct(){
		
		$this->db_params=require  __DIR__. '\..\..\config.php';

		
	}

	function getConnection(){
		
		$conn = mysqli_connect($this->db_params['hostname'],$this->db_params['username'],$this->db_params['password'],$this->db_params['dataname']);
		if($conn->connect_error){
			die("Connection Faild: ". $conn->connect_error);
		}
		return $conn;
	}

}


?>