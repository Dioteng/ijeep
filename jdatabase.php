<?php

	$hostname = "localhost";
	$username = "postgres";
	$password = "ite152";
	$database = "ite152";

	$con = pg_connect("host = $hostname user = $username password = $password dbname = $database");
	
if (!$con) { 
	die ("Failed to Connect");
}
?>