<?php
session_start();
if(isset($_SESSION['uname'])){
    //echo '<h3>Login Success, Welcome - '.$_SESSION['aname']. '<\h3>';
    
}else{
      header("location: guard.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guard</title>
    <link rel="stylesheet" href="guardhomee.css">
</head>
<body>
<div class="header">
        <a href="viewslot.php"><button id="b1">View Book Slot</button></a>
        <a href="viewparking.php"><button id="b2">View Parking </button></a>
        <a href="option.php"><button id="b3">Slots</button></a>
        <a href="logoutguard.php"><button id="b4">Log-out</button></a>
    </div>
</body>
</html>