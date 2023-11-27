<?php
 require_once('functions/function.php');

 $id=$_GET['dt'];
 
 $del="DELETE FROM teams WHERE tm_id='$id'";
 if(mysqli_query($con,$del)){
    header('location: all-team.php');
 }else{
    echo "Opps! Failed your operation";
 }
?>