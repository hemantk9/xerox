<?php
/**
* Class AbstractMechanism
* This class will be derived for specific API
* It has common functions for both the APIs
*/
class AbstractMechanism {
	protected $username;
	protected $password;
	protected $data;
	protected $url;
	function __construct($url, $username, $password, $data) {		//Initialize variables
		$this->url=$url;
		$this->username=$username;
		$this->password=$password;
		$this->data=$data;
	}

	public function postIssue() {									//Post issue using curl
		$agent="Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $this->data);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($ch, CURLOPT_USERPWD, $this->username.":".$this->password);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_USERAGENT, $agent);
		curl_exec($ch);
		$info=curl_getinfo($ch);
		if ($info['http_code']==201 || $info['http_code']==200) {
			return "Issue posted successfully";
		} elseif ($info['http_code']==401) {
			return "Please check username and password";
		} else {
			return "Request Failed";
		}
		curl_close($ch);
	}
}
?>