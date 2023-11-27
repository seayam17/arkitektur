<?php
 require_once('functions/function.php');

 $id=$_GET['df'];
 
 $del="DELETE FROM footers WHERE f_id='$id'";
 if(mysqli_query($con,$del)){
    header('location: all-footer.php');
 }else{
    echo "Opps! Failed your operation";
 }
?>