<?php
 require_once('functions/function.php');

 $id=$_GET['dfc'];
 
 $del="DELETE FROM facts WHERE fact_id='$id'";
 if(mysqli_query($con,$del)){
    header('location: all-fact.php');
 }else{
    echo "Opps! Failed your operation";
 }
?>