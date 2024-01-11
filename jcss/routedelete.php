<?php

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "jeepdb";

    $connect = mysqli_connect($hostname, $username, $password, $database);
    
    $connect = mysqli_connect("localhost", "root", "", "jeepdb");
if ($connect == TRUE) { //echo "success man";
} else {
    echo "Failed to Connect";
}
?>


<?php

if (isset($_POST['delete'])) 
{
    $id=$_POST['id'];
    $query="DELETE FROM route WHERE route_id='$id'";
    $query_run=mysqli_query($connect,$query);


    if ($query_run) 
    {
       echo "<script> alert('ROUTE DELETED'); window.location='adminroute.php'; </script>";
    }
    else  
    {
        echo"<script>alert('DATA NOT DELETED');</scipt>";
    }
}


?>