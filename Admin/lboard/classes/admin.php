<?php
//require '../core/config.php';
class admin {
	private $_db;

	private  function _connect(){
		$this -> _db = new MySQLi(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
		if($this -> _db -> connect_errno)
			die("MySQL Error : " . $this -> _db -> connect_error);
	}

	public function is_table_present(){
		$this->_connect();
		$query="SELECT * from admin";
		$result = $this->_db->query($query);
    		if($this->_db->error!=''){
    			
    			$query="create table admin (id int NOT NULL AUTO_INCREMENT PRIMARY KEY,username varchar(255),password varchar(255))";
    			$result = $this->_db->query($query);
    		}
    		else
    			return 1;
	}
}
?>