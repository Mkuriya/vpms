<?php
//Database configuration
$host = `localhost`;
$dbname= 'vpms';
$username = 'root';
$password = '';

//Create a PDO instance
try{
    $pdo = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die("Error: " .$e->getMessage());
}

//SQL query for selectring data
$sql = "SELECT * FROM admin_data";

//Execute the query and fetch data
$stmt = $pdo->query($sql);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <link rel="stylesheet" href="home.css">
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
                <div class="back">
            <label></label>
        <a href="home.php"><button id="b_7">Back</button></a> 
        </div>
    </div>
    <br>
    <h1>Admin List</h1>
        <table>
            <tr>
                
                <th>Admin Number</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Email</th>
            </tr>
            <?php foreach ($result as $row):?>
                <tr>
                    <td><?php echo $row['admin_num'];?></td>
                    <td><?php echo $row['firstname'];?></td>
                    <td><?php echo $row['middlename'];?></td>
                    <td><?php echo $row['lastname'];?></td>
                    <td><?php echo $row['email'];?></td>	
                </tr>
                <?php endforeach; ?>
        </table>
        <form action="deleteadmin.php" method="post">
        
        <h1>Delete Information</h1>
            <label for="admin_num">Admin Number:</label>
            <input type="text" name="admin_num" id="admin_num" required>
            <p>Warning this</p>
            <input type="submit" value="Delete">
        </form>
        

    </body>
</html>