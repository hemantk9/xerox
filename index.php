<?php
if ( !extension_loaded ( "curl" )) {
	die ("Please enable curl extension in php.ini");
}

$options = getopt("u:p:");		// options for accepting username and password
$username = $options['u'];		// Get Username
$password = $options['p'];		// Get Password
$repoUrl = $argv[5];			// Get Repo URL
$issueTitle = $argv[6];			// Get Issue Title
$issueDescription = $argv[7];	// Get Issue Description
$urlDetails = parse_url($repoUrl);		// Extract scheme, hostname and Path
$repoPath = $urlDetails['path'];	// Repository Path
$domain = $urlDetails['host'];		// Host Name

if (stripos($domain, "github") >= 0 && stripos($domain, "github")!==false) {
	include_once("GithubMechanism.php");
	$object = new GithubMechanism($username, $password, $issueTitle, $issueDescription, $repoPath);
	echo $object->postIssue();
} elseif (stripos($domain, "bitbucket") >= 0 && stripos($domain, "bitbucket")!==false) {
	include_once("BitbucketMechanism.php");
	$object = new BitbucketMechanism($username, $password, $issueTitle, $issueDescription, $repoPath);
	echo $object->postIssue();
} else {
	echo "API not supported";
}
?>