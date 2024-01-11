<?php
include("jdatabase.php");

$result = pg_query_params($con, 'SELECT count_vehicles($1)', array("jeep")) or die('Query failed: ' . pg_last_error());
$count = pg_fetch_result($result, 0, 0);

echo $count;
?>