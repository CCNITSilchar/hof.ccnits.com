<?php

//call function connect_api(test code) and in return get a json decoded object 
//require '../core/config.php';
class candidate_api{
	private $_url,
			$_proxy,
			$_client_id,
			$_client_secret,
			$_test_id,
			$_email;
	public function __construct($id,$secret){
			$this->_url='https://api.hackerearth.com/recruiter/v1/tests/candidate_report/';
			$this->_proxy=PROXY;
			$this->_client_id=$id;
			$this->_client_secret=$secret;
			$this->_test_id=NULL;
			$this->_email=NULL;
	}

	public function connect_api($test_code,$email){
		$this->_test_id=$test_code;
		$this->_email=$email;
		$details = json_encode(array('client_id' => $this->_client_id,'client_secret' =>$this->_client_secret, 'test_id' =>$this->_test_id,'email'=>$this->_email));

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 0); //enables proxy
		curl_setopt($ch, CURLOPT_URL,$this->_url);
		curl_setopt($ch, CURLOPT_PROXY,$this->_proxy);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$details);
		

		$curl_result = curl_exec($ch);
		curl_close($ch);

		$curl_result = json_decode($curl_result, true);
		return $curl_result;


	}

}
/*$candidate=new candidate_api();
$res=$candidate->connect_api(11902,"harshitdd120@gmail.com");
echo " <pre>";
print_r($res);
$res=$candidate->connect_api(11902,"nainwalarun@gmail.com");
echo " <pre>";
print_r($res);
*/
?>
