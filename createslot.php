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
        <form action="addslot.php" method="post">
            <h1>Add Book Slot</h1>
            <label for="slot">Plate Number:</label>
            <input type="text" name="platenumber" id="platenumber" required><br><br>

            <label for="selectdate">Select Date:</label>
            <input type="date" name="selectdate" id="selectdate" required><br><br>

            <label for="starttime">Start Time:</label>
            <input type="time" name="starttime" id="starttime" required><br><br>

            <label for="selecthour">Select Hours:</label>
            <select name="selecthour" id="selecthour" required> <br><br>
                <option>=== Select Hours ===</option>
                <option value="1 hour">1 hour</option>
                <option value="2 hour">2 hour</option>
                <option value="3 hour">3 hour</option>
                <option value="4 hour">4 hour</option>
                <option value="5 hour">5 hour</option>
                <option value="6 hour">6 hour</option>
                <option value="7 hour">7 hour</option>
                <option value="8 hour">8 hour</option>
                <option value="9 hour">9 hour</option>
                <option value="10 hour">10 hour</option>
                <option value="11 hour">11 hour</option>
                <option value="12 hour">12 hour</option>
                </select>
                <br><br>

            <input type="submit" value="Create" class="cbtn">
        </form>
    </body>
</html>