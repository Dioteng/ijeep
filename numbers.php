<?php
include("jdatabase.php");

$result = pg_query_params($con, 'SELECT count_conductors($1)', array("conductors")) or die('Query failed: ' . pg_last_error());
$count = pg_fetch_result($result, 0, 0);

echo $count;
?>