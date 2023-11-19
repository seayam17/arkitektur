<?php
 require_once('functions/function.php');

 $id=$_GET['db'];
 
 $del="DELETE FROM banners WHERE ban_id='$id'";
 if(mysqli_query($con,$del)){
    header('location: all-banner.php');
 }else{
    echo "Opps! Failed your operation";
 }
?>