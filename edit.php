
<?php 
    session_start();

    if(!isset($_SESSION['username'])){
       
    header('location: index.php');
    }

    include 'dbconnect.php';
    $query = "SELECT * FROM  products";

    $result =mysqli_query($con,$query) or die("error ").mysqli_error($query);

   

   ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit stock</title>

    <link rel="stylesheet" href="style.css?v=1001">
</head>
<body>

   
<center><a href="index.php">Home</a></center>

<center><h2>หน้าจัดการสินค้า</h2></center>
<br>
<div class="div1" >
        <form action="dataedit.php"  method ="POST">
        <center> <label for="item" style="color:red"><b>แก้ไขจำนวนสินค้า</b> </label></center>
        <label for="item2" >เลือกรายการ : </label>
  <select id="item" name="ID"><br>
  
  <?php foreach ($result as $row) {   ?>   
    <option value=" <?php echo $row['ID']; ?>" > <?php echo $row['name']; ?> </option>
   
    <?php } ?>

  </select> 
  <br>
  จำนวน
  <input type="number" id="quantity" name="quantity" min="0" >
  <button type="submit" name="editamout" class="btn">อัพเดทจำนวน</button>

        </form></div>

<div class="div2" >
        <form action="dataedit.php"  method ="POST">
  <center><label for="item" style="color:green" ><b> เพิ่มรายการสินค้า</b></label></center>
   
  ชื่อสินค้า
  <input type="text"  name="newitem"  ><br>
  จำนวน<input type="number" id="quantity" name="quantity" min="0" >
  <button type="submit" name="add" class="btn2">เพิ่มรายการ</button>

        </form>

</div>
<table class="homecontent">
 <?php if(isset($_SESSION['success'])): ?>
            <div class='success'>
            <h3>
                <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
            </h3>
            </div>
            <?php endif ?>

    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>amout</th>
            
        </tr>
        </thead>

        <tbody>
        <?php foreach ($result as $row) {   ?>
                <tr>
                        <td><?php echo $row['ID']; ?>   </td>
                        <td><?php echo $row['name']; ?>   </td>
                        <td><?php echo $row['amout']; ?>   </td>
                        <td><a href="delete.php?id=<?php echo $row['ID'];?>">ลบ</a></td>
                
                
                </tr>
                <?php } ?>
        </tbody>
</table>
<br><br>

    
</body>
</html>
   
   
  