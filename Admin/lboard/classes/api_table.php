<?php
//require '../core/config.php';
class api_table {
	private $_db;

	private  function _connect(){
		$this -> _db = new MySQLi(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
		if($this -> _db -> connect_errno)
			die("MySQL Error : " . $this -> _db -> connect_error);
	}

	public function is_table_present(){
		$this->_connect();
		$query="SELECT * from api_table";
		$result = $this->_db->query($query);
    		if($this->_db->error!=''){
    			
    			$query="create table api_table (id int NOT NULL AUTO_INCREMENT PRIMARY KEY,provider varchar(255),client_id varchar(255),client_secret varchar(255),url varchar(255))";
    			$result = $this->_db->query($query);
    		}
    		else
    			return 1;
	}

	public function get_client_id($provider){
		$this->_connect();
		$hacker_id=$this->_db->real_escape_string($provider);
		$query="SELECT client_id from api_table WHERE provider='".$provider."'";
		$result = $this->_db->query($query);      
        if($result->num_rows){
            return $result->fetch_assoc()['client_id'];
        }else{
            return '';
        }
	}


	public function get_client_secret($provider){
		$this->_connect();
		$hacker_id=$this->_db->real_escape_string($provider);
		$query="SELECT client_secret from api_table WHERE provider='".$provider."'";
		$result = $this->_db->query($query);      
        if($result->num_rows){
            return $result->fetch_assoc()['client_secret'];
        }else{
            return '';
        }
	}

	public function get_api_url($provider){
		$this->_connect();
		$hacker_id=$this->_db->real_escape_string($provider);
		$query="SELECT url from api_table WHERE provider='".$provider."'";
		$result = $this->_db->query($query);      
        if($result->num_rows){
            return $result->fetch_assoc()['url'];
        }else{
            return '';
        }
	}
}
?>