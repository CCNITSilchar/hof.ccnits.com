<?php

//call function connect_api(test code) and in return get a json decoded object 
//require '../core/config.php';
class api{
	private $_url,
			$_proxy,
			$_client_id,
			$_client_secret,
			$_test_id;
	public function __construct($url,$id,$secret){
			$this->_url=$url;
			$this->_proxy=PROXY;
			$this->_client_id=$id;
			$this->_client_secret=$secret;
			$this->_test_id=NULL;
	}

	public function connect_api($test_code){
		$this->_test_id=$test_code;
		$details = json_encode(array('client_id' => $this->_client_id,'client_secret' => $this->_client_secret, 'test_id' =>$this->_test_id));

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
/*$api=new api();
$res=$api->connect_api(11902);
print_r($res);*/
?>
