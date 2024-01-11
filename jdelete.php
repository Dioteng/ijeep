<?php
include 'jdatabase.php';
if(isset($_GET['deletedemail'])){
    $email=$_GET['deletedemail'];

$sql="DELETE FROM `commuters` WHERE email='" . $_SESSION["email"] . "'";
$result=mysql_query($connection,$sql);
if(result){
    echo "Deleted Successful";
}else{  
    echo "wala na delete";

}
}

?>