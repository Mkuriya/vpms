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
$sql = "SELECT * FROM guard_data";

//Execute the query and fetch data
$stmt = $pdo->query($sql);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <br>
    <h1>Guard List</h1>
        <table>
            <tr>
                
                <th>Guard Number</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
            </tr>
            <?php foreach ($result as $row):?>
                <tr>
                    <td><?php echo $row['guardnumber'];?></td>
                    <td><?php echo $row['firstname'];?></td>
                    <td><?php echo $row['middlename'];?></td>
                    <td><?php echo $row['lastname'];?></td>	
                </tr>
                <?php endforeach; ?>
        </table>
        <form action="delguard.php" method="post">
        
        <h1>Delete Information</h1>
            <label for="guardnumber">Guard Number:</label>
            <input type="text" name="guardnumber" id="guardnumber" required>

            <input type="submit" value="Delete">
        </form>
    </body>
</html>