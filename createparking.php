<?php
session_start();
if(isset($_SESSION['uname'])){
    //echo '<h3>Login Success, Welcome - '.$_SESSION['aname']. '<\h3>';
    
}else{
      header("location: guard.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Guard</title>
        <link rel="stylesheet" href="guardhomee.css">
</head>
<body>
<div class="header">
    <div class="parking">
        
        <a href="createparking.php"><button id="b-1">Create Parking Slot</button></a>
        </div>
        <div class="slot">
        <a href="createslot.php"><button id="b-4">Create Reserve Slot</button></a>
        </div>
        <div class="back">
        <a href="guardhome.php"><button id="b-7">Back</button></a>
    </div>
    </div>
        <form action="addparking.php" method="post">
            <h1>Add Parking</h1>
            <label for="slotname">Slot Name:</label>
            <input type="text" name="slot" id="slot" required><br><br>

            <input type="submit" value="Create" id="btn">
        </form>
    </body>
</html>