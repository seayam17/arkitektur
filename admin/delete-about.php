<?php
 require_once('functions/function.php');

 $id=$_GET['da'];
 
 $del="DELETE FROM about WHERE about_id='$id'";
 if(mysqli_query($con,$del)){
    header('location: all-about.php');
 }else{
    echo "Opps! Failed your operation";
 }
?>