<?php
session_start();
if(isset($_SESSION['uname'])){
    //echo '<h3>Login Success, Welcome - '.$_SESSION['aname']. '<\h3>';
    
}else{
      header("location: admin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="homee.css">
   
</head>
<body>
    
<div class="header">
        <a href="viewaccad.php"><button id="b1">View Admin Account</button></a>
        <a href="viewguardacc.php"><button id="b2">View Guard Account</button></a>
        <a href="accountset.php"><button id="b3">Accounts</button></a>
        <a href="logout.php"><button id="b4">Log-out</button></a>
    </div>
    
</body>
</html>