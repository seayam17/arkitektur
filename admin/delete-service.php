<?php
 require_once('functions/function.php');

 $id=$_GET['ds'];
 
 $del="DELETE FROM services WHERE ser_id='$id'";
 if(mysqli_query($con,$del)){
    header('location: all-service.php');
 }else{
    echo "Opps! Failed your operation";
 }
?>