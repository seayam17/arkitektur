<?php
 require_once('functions/function.php');

 $id=$_GET['dc'];
 
 $del="DELETE FROM contacts WHERE cons_id='$id'";
 if(mysqli_query($con,$del)){
    header('location: all-contacts.php');
 }else{
    echo "Opps! Failed your operation";
 }
?>