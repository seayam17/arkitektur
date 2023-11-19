<?php
 require_once('functions/function.php');

 $id=$_GET['dm'];
 
 $del="DELETE FROM contact WHERE con_id='$id'";
 if(mysqli_query($con,$del)){
    header('location: all-message.php');
 }else{
    echo "Opps! Failed your operation";
 }
?>