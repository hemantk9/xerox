This Script is developed for posting issue on git repositories, currently only Github and Bitbucket are supported.

To run this script use following steps.

	1. Clone the repository 
	2. run the script using following syntax
		php <path-to-directory>/index.php -u <username> -p <password> <repository-url> <issue-title> <issue-description>

		example
		php <path-to-directory>/index.php -u jdoe -p secret https://github.com/example/test "The title of my issue" "Here's what I did to reproduce the problem"

System Requirements
	PHP version 5 and above.
	PHP curl library