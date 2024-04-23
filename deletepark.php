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
$sql = "SELECT * FROM parking";

//Execute the query and fetch data
$stmt = $pdo->query($sql);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
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
    <br>
    <h1>Parking List</h1>
        <table>
            <tr>
                <th>ID Number</th>
                <th>Slot Name</th>
                
            </tr>
            <?php foreach ($result as $row):?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['slot'];?></td>
                </tr>
                <?php endforeach; ?>
        </table>
        <form action="deleteparking.php" method="post">
        
        <h1>Delete Information</h1>
            <label for="id">Admin Number:</label>
            <input type="text" name="id" id="id" required>

            <input type="submit" value="Delete">
        </form>
    </body>
</html>