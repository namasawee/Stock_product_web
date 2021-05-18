<?php  
include 'dbconnect.php';





   $id=$_GET['id'];
 
  $sql="DELETE FROM products WHERE ID ='$id' ";
  $result=mysqli_query($con,$sql);
    if($result){
        header("location:edit.php");
    }




?>