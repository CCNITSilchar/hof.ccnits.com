<?php

class contest {
	private $_db;

	private  function _connect(){
		$this -> _db = new MySQLi(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
		if($this -> _db -> connect_errno)
			die("MySQL Error : " . $this -> _db -> connect_error);
	}

	public function is_table_present(){
		$this->_connect();
		$query="SELECT * from contest";
		$result = $this->_db->query($query);
    		if($this->_db->error!=''){
    			
    			$query="create table contest (id int NOT NULL AUTO_INCREMENT PRIMARY KEY,he_id int UNIQUE NOT NULL,type float DEFAULT 1,date DATE,link varchar(255),evaluated int DEFAULT 0)";
    			$result = $this->_db->query($query);
    		}
    		else
    			return 1;
	}

    public function add_contest($contest_id,$contest_name,$contest_type,$contest_date,$contest_link){
        $this->_connect();
        $contest_id=$this->_db->real_escape_string($contest_id);
		$contest_name=$this->_db->real_escape_string($contest_name);
        $contest_type=$this->_db->real_escape_string($contest_type);
		$contest_link=$this->_db->real_escape_string($contest_link);
        $contest_date=$this->_db->real_escape_string($contest_date);
        $query="INSERT into contest (he_id,name,type,link,date) VALUES ('".$contest_id."','".$contest_name."','".$contest_type."','".$contest_link."','".$contest_date."')";
        $result=$this ->_db->query($query);
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


    public function get_contest_no($contest_id){
        $this->_connect();
        $contest_id=$this->_db->real_escape_string($contest_id);
        $query="SELECT id from contest WHERE he_id='".$contest_id."'";
        $result = $this->_db->query($query);      
        if($result->num_rows){
            return $result->fetch_assoc()['id'];
        }else{
            return '';
        }
    }

    public function is_not_rated($contest_id){
        $this->_connect();
        $contest_id=$this->_db->real_escape_string($contest_id);
        $query="SELECT evaluated from contest WHERE he_id='".$contest_id."'";
        $result = $this->_db->query($query);      
        if($result->num_rows){
            //echo "in if ";
            //echo $result->fetch_assoc()['rated'];
            return $result->fetch_assoc()['evaluated'];
        }else{
            //echo "in else ";
            return 0;
        }
    }

    public function rate_contest($contest_id){
        $this->_connect();
        $contest_id=$this->_db->real_escape_string($contest_id);
        $query="UPDATE contest SET evaluated=1 WHERE he_id='".$contest_id."'";
    
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

    public function is_contest_present($contest_id){
        $this->_connect();
        $contest_id=$this->_db->real_escape_string($contest_id);
        $query="SELECT evaluated from contest WHERE he_id='".$contest_id."'";
        $result = $this->_db->query($query);      
        if($result->num_rows){
            //echo "in if ";
            //echo $result->fetch_assoc()['rated'];
            return 1;
        }else{
            //echo "in else ";
            return 0;
        }
    }

    

    public function get_not_evaluated_contest(){
        $this->_connect();
        
        $query="SELECT he_id from contest WHERE evaluated=0";
        $result = $this->_db->query($query);      
        if($result->num_rows){
            return $result->fetch_assoc()['he_id'];
        }else{
            return '';
        }   
    }

    public function get_contest_type($contest_id){
        $this->_connect();
        $contest_id=$this->_db->real_escape_string($contest_id);
        $query="SELECT type from contest WHERE he_id='".$contest_id."'";
        $result = $this->_db->query($query);      
        if($result->num_rows){
            return $result->fetch_assoc()['type'];
        }else{
            return '';
        }
    }



}
//$contests =new contests();
//$contests->is_table_present();
//$contests->add_contest(11641,1,"2016-01-06");
?>
