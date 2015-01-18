<?php
/**
* Class BitbucketMechanism
* This class will be used for accessing Bitbucket API
*/
include_once("AbstractMechanism.php");

class BitbucketMechanism extends AbstractMechanism {
	
	function __construct($username, $password, $issueTitle, $issueDescription, $repoPath) {
		$data=array("title"=>$issueTitle,"content"=> $issueDescription);
		$url="https://api.bitbucket.org/1.0/repositories".$repoPath."/issues";
		parent::__construct($url, $username, $password, $data);
	}
}
?>