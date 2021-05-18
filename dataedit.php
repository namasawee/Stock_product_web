<?php  
include 'dbconnect.php';


if(isset($_POST['editamout'])){
 
     $id= $_POST['ID'];
     $quantity= (int)$_POST['quantity'];
    

     $newvalue = "UPDATE products SET amout = $quantity WHERE ID = '$id' ";
     $dataedit = mysqli_query($con, $newvalue);
     
     //header('location : edit.php');
if($dataedit){
   
  echo "<script type='text/javascript'>alert('บันทึกสำเร็จ');</script>";
  header('location:edit.php'); 
}
}
         ////////////
if(isset($_POST['add'])){
 
          $name= mysqli_real_escape_string($con, $_POST['newitem']);
          $quantity= (int)$_POST['quantity'];
         
     
          $sql = "INSERT INTO products(name , amout) VALUES ('$name','$quantity') ";
          $dataadd = mysqli_query($con, $sql);
          
          //header('location : edit.php');
     if($dataadd){
        
       echo "<script type='text/javascript'>alert('บันทึกสำเร็จ');</script>";
       header('location:edit.php');
     
       
     }
              }

// if(isset($_GET['ID'])){
//   $id=$_GET['ID'];
//   $sql="DELETE FROM products WHERE ID ='$id' ";
//   mysqli_query($con,$sql);
// }




?>