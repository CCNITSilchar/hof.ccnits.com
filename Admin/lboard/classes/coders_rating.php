<?php
//require '../core/config.php';
class rating {
	private $_db;

	private  function _connect(){
		$this -> _db = new MySQLi(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
		if($this -> _db -> connect_errno)
			die("MySQL Error : " . $this -> _db -> connect_error);
	}

	public function is_table_present(){
		$this->_connect();
		$query="SELECT * from contest_user_rating";
		$result = $this->_db->query($query);
    		if($this->_db->error!=''){
    			
    			$query="create table contest_user_rating (id int UNIQUE PRIMARY KEY AUTO_INCREMENT,cid int,uid int,rating int DEFAULT 1500,FOREIGN KEY (cid) REFERENCES contest(id),FOREIGN KEY (uid)REFERENCES user(id))";
    			$result = $this->_db->query($query);
    			
       		}
    		else
    			return 1;
	}

	/*public function add_new_coder($hacker_id){
		$this->_connect();
		$hacker_id=$this->_db->real_escape_string($hacker_id);
		$query="INSERT into contest_user_rating (hacker_id) VALUES ('".$hacker_id."')";
		$result=$this ->_db->query($query);
		if($this->_db->affected_rows){
                    return 1;
                }
                else {
	                return 0;
                }
   	}

	public function add_new_rating_column($id_contest){
		$this->_connect();
		$id_contest="rating_".$id_contest;
		$id_contest=$this->_db->real_escape_string($id_contest);
		
		$query="ALTER table contest_user_rating ADD COLUMN {$id_contest} int DEFAULT 0";
	
		$result=$this ->_db->query($query);
		echo $this->_db->error;
		if($this->_db->affected_rows){
                    return 1;
                }
                else {
	                return 0;
                }
   }*/
        		

	

	public function insert_new_rating($cid,$uid,$rating){
		$this->_connect();
		
		$cid=$this->_db->real_escape_string($cid);
		$uid=$this->_db->real_escape_string($uid);
		$rating=$this->_db->real_escape_string($rating);
		$query="INSERT INTO  contest_user_rating (cid,uid,rating) VALUES ('".$cid."','".$uid."','".$rating."')";
	
		$result=$this ->_db->query($query);
		echo $this->_db->error;
		if($this->_db->affected_rows){
                   return 1;
                }
                else {
                   return 0;
                }
    }
        		

	
	public function get_final_rating($hacker_id){
		$this->_connect();
		$hacker_id=$this->_db->real_escape_string($hacker_id);
		$query="SELECT final_rating from contest_user_rating WHERE hacker_id='".$hacker_id."'";
		$result = $this->_db->query($query);      
        if($result->num_rows){
            return $result->fetch_assoc()['final_rating'];
        }else{
            return '';
        }
	}


}
/*$rating =new rating();
$rating->is_table_present();
$rating->add_new_coder(554);
$rating->add_new_rating_column(1);
		echo "done";
echo ($rating->get_final_rating(82666));
*/
?>