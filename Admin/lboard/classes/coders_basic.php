<?php
//require '../core/config.php';
class coders {
	private $_db;

	private  function _connect(){
		$this -> _db = new MySQLi(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
		if($this -> _db -> connect_errno)
			die("MySQL Error : " . $this -> _db -> connect_error);
	}

	
	public function is_coder_present($Id){ 
		$this->_connect();
		$Id= $this-> _db -> real_escape_string($Id);
		$query="select * from user where he_id = '".$Id."'";
		$result=$this ->_db->query($query);
		if($this->_db->affected_rows){
                	return 1;
                }
                else {
	                return 0;
                }	
	}		

	
	public function is_table_present(){
		$this->_connect();
		$query="SELECT * from user";
		$result = $this->_db->query($query);
    		if($this->_db->error!=''){
    			
    			$query="create table user (id int PRIMARY KEY NOT NULL AUTO_INCREMENT,he_id int UNIQUE,name varchar(255),rating int DEFAULT 1500,new_coder int)";
    			$result = $this->_db->query($query);
    			
    		}
    		else
    			return 1;
	}

	public function add_new_coder($he_id,$name){
		$this->_connect();
		$he_id=$this->_db->real_escape_string($he_id);
		$name=$this->_db->real_escape_string($name);
		$query="INSERT into user (he_id,name,new_coder) VALUES ('".$he_id."','".$name."',1)";
		$result=$this ->_db->query($query);
		if($this->_db->affected_rows){                
                    return 1;
                }
                else {
	                return 0;
                }       
	}


	public function is_new_coder($he_id){
		$this->_connect();
		$he_id= $this->_db->real_escape_string($he_id);
		$query="SELECT new_coder from user WHERE he_id='".$he_id."'";
		$result = $this->_db->query($query);
        if($result->num_rows){
            return $result->fetch_assoc()['new_coder'];
        }else{
            return '';
        }
	}

	public function new_to_old(){
		$this->_connect();
		$query="UPDATE user SET new_coder=0 WHERE new_coder=1";
	
		$result=$this ->_db->query($query);
		echo $this->_db->error;
		if($this->_db->error==''){
                if($this->_db->affected_rows){
                    return 1;
                }
                else {
	                return 0;
                }
            }
        else{
           	die($this->_db->error);
		}		

	}

	public function get_final_rating($hacker_id){
		$this->_connect();
		$hacker_id=$this->_db->real_escape_string($hacker_id);
		$query="SELECT rating from user WHERE he_id='".$hacker_id."'";
		$result = $this->_db->query($query);      
        if($result->num_rows){
            return $result->fetch_assoc()['rating'];
        }else{
            return '';
        }
	}

	public function get_uid($hacker_id){
		$this->_connect();
		$hacker_id=$this->_db->real_escape_string($hacker_id);
		$query="SELECT id from user WHERE he_id='".$hacker_id."'";
		$result = $this->_db->query($query);      
        if($result->num_rows){
            return $result->fetch_assoc()['id'];
        }else{
            return '';
        }
	}

	public function update_rating($he_id,$rating){
		$this->_connect();
		$query="UPDATE user SET rating='".$rating."' WHERE he_id='".$he_id."'";
	
		$result=$this ->_db->query($query);
		echo $this->_db->error;
		if($this->_db->error==''){
                if($this->_db->affected_rows){
                    return 1;
                }
                else {
	                return 0;
                }
            }
        else{
           	die($this->_db->error);
		}		

	}

}


//$coder=new coders();
//echo $coder->is_new_coder(82666);
?>
