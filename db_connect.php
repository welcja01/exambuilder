<!-- Author: Sunghee Kim -->
<?php
// script to connect to mysqlserver 

$server = 'ada.cc.gettysburg.edu';
$port = 3306;
$user = 'welcja01'; 
$pass= 'AQ24896';
$dbname = 'sj_cs360';
try {
	$db = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
}
catch(PDOException $ex) {

	die("MySQL connection error: " . $ex -> getMessage ());

}

