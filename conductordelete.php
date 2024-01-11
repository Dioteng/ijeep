<?php
include("jdatabase.php");

if (isset($_POST['delete'])) 
{
    $id=$_POST['id'];
    $query="CALL delete_conductor('conductors', $id)";
    $query_run=pg_query($con,$query);

    $sqle="Select * From trans_duty
    Where c_id = " . $_POST['id'] . ";";
    $querye=pg_query($con, $sqle);
    $fetche=pg_fetch_array($querye);

    if ($query_run) 
    {
       echo "<script> alert('CONDUCTOR DELETED'); window.location='adminconductor.php'; </script>";
    }
    elseif(pg_num_rows($querye)== 1) {
    echo "<script> alert('Conductor Is On DUTY! (pls no delete)'); window.location='adminconductor.php'; </script>";
    }
    else  
    {
        echo"<script>alert('DATA NOT DELETED');</scipt>";
    }
}
?>