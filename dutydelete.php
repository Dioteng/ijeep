<?php
include("jdatabase.php");

if (isset($_POST['delete'])) 
{
    $id=$_POST['id'];
    $query="CALL delete_duty('trans_duty', $id)";
    $query_run=pg_query($con,$query);


    if ($query_run) 
    {
       echo "<script> alert('Jeep is back!'); window.location='adminduty.php'; </script>";
    }
    else  
    {
        echo"<script>alert('DATA NOT DELETED');</scipt>";
    }
}
?>