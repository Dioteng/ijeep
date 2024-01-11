   <?php
   include("jdatabase.php");
$query ="SELECT COUNT( * ) as 'plate_num'
FROM jeep";
$query_run = mysqli_query($connect, $query);
$row = mysqli_num_rows($query_run);
echo $row;
?>