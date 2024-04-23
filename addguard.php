<?php
session_start();
if(isset($_SESSION['uname'])){
    //echo '<h3>Login Success, Welcome - '.$_SESSION['aname']. '<\h3>';
    
}else{
      header("location: admin.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <link rel="stylesheet" href="homee.css">
</head>
<body>
<div class="header">
        <div class="admin">
            <label>Admin</label>
        <a href="addadmin.php"><button id="b_1">Create</button></a>
        </div>
        <div class="guard">
            <label>Guard</label>
        <a href="addguard.php"><button id="b_4">Create</button></a>
        </div>
        <div class="back">
            <label></label>
        <a href="home.php"><button id="b_7">Back</button></a> 
        </div>
    </div>
        <form action="createguard.php" method="post">
            <h1>Guard Information</h1>
            <label for="firstname">First Name:</label>
            <input type="text" name="firstname" id="firstname" required><br><br>

            <label for="middlename">Middle Name:</label>
            <input type="text" name="middlename" id="middlename" required><br><br>

            <label for="lastname">Last Name:</label>
            <input type="text" name="lastname" id="lastname" required><br><br>

            <label for="username">Username:</label>
            <input type="text" name="uname" id="uname" required><br><br>

            <label for="password">Password:</label>
            <input type="text" name="pword" id="pword" required><br><br>

            <input type="submit" value="Create" id="btn">
        </form>
    </body>
</html>