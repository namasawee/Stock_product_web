


<?php 
    session_start();


    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: index.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <link rel="stylesheet" href="style.css?v=1001">
</head>
<body>
<?php
include 'dbconnect.php';

$query = "SELECT * FROM  products";

$result =mysqli_query($con,$query) or die("error ").mysqli_error($query);


?>
    <div class="header">
        <h2>หน้าหลัก</h2>

        <?php if(!isset($_SESSION['username'])) : ?>
        <h3><a href="login.php">Login</a></h3>
        <h4><a href="register.php" style="color:green">Register</a></h4>  
       <?php endif ?>

    </div>


    <?php if (isset($_SESSION['username'])) : ?>
        
    <div class="header">
        <!--  notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="success">
                <h3>
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
    
        <!-- logged in user information -->
       
            <p>ยินดีต้อนรับคุณ <strong><?php echo $_SESSION['username']; ?></strong></p>

            
            <p><a href="edit.php" style="color:#7FFF00;">จัดการสินค้า</a> 
            &nbsp; <a href="index.php?logout='1'" style="color: red;">ออกจากระบบ</a></p>
        <?php endif ?>
    </div>

    <div class="header">
    <h1>คลังสินค้า </h1>
  
    <h2 >จำนวนสินค้าในคลัง </h2>
    </div><br>
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
                
                
                
                </tr>
                <?php } ?>
        </tbody>
</table>

</body>
</html>