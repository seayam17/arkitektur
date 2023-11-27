<?php
 require_once('functions/function.php');

 $id=$_GET['dp'];
 
 $del="DELETE FROM projects WHERE pj_id='$id'";
 if(mysqli_query($con,$del)){
    header('location: all-project.php');
 }else{
    echo "Opps! Failed your operation";
 }
?>