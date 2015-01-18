<?php
/**
* Class GithubMechanism
* This class will be used for accessing github API
*/
include_once("AbstractMechanism.php");

class GithubMechanism extends AbstractMechanism {
	
	function __construct($username, $password, $issueTitle, $issueDescription, $repoPath) {
		$data=json_encode(array("title"=>$issueTitle,"body"=> $issueDescription));
		$url="https://api.github.com/repos".$repoPath."/issues";
		parent::__construct($url, $username, $password, $data);
	}
}
?>