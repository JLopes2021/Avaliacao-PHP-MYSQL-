<?php

class Conexao{
 
	public $conn;
	
	function __construct() {
	
		$this->conn=mysqli_connect('host.docker.internal', 'root', '', 'titan') or die ( 'Connection Error' );
	
	}

	function exec($sql){
	
	$result = mysqli_query($this->conn, $sql) or die ( mysqli_error( $this->conn ) );
	return $result;
	
	}

	


}