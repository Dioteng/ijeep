<?php
include("jdatabase.php");

if (isset($_POST['delete'])) 
{
    $id=$_POST['id'];
    $query="CALL delete_driver('drivers', $id)";
    $query_run=pg_query($con,$query);

    $sqle="Select * From trans_duty
    Where d_id = " . $_POST['id'] . ";";
    $querye=pg_query($con, $sqle);
    $fetche=pg_fetch_array($querye);

    if ($query_run) 
    {
       echo "<script> alert('Driver DELETED'); window.location='admindriver.php'; </script>";
    }
     elseif(pg_num_rows($querye)== 1) {
    echo "<script> alert('Driver Is On DUTY! (pls no delete)'); window.location='admindriver.php'; </script>";
    }
    else  
    {
        echo"<script>alert('DATA NOT DELETED');</scipt>";
    }
}
?>