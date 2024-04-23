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
$sql = "SELECT * FROM slot";

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
    <h1>Slot List</h1>
        <table>
            <tr>
                <th>Slot Id</th>
                <th>Plate Number</th>
                <th>Select Date</th>
                <th>Start Time</th>
                <th>Select Hour</th>
                
                
            </tr>
            <?php foreach ($result as $row):?>
                <tr>
                <td><?php echo $row['slotid'];?></td>
                    <td><?php echo $row['platenumber'];?></td>
                    <td><?php echo $row['selectdate'];?></td>
                    <td><?php echo $row['starttime'];?></td>
                    <td><?php echo $row['selecthour'];?></td>
                    	
                </tr>
                <?php endforeach; ?>
        </table>
        <form action="deleteslott.php" method="post">
        
        <h1>Delete Information</h1>
            <label for="slotid">Slot Number:</label>
            <input type="text" name="slotid" id="slotid" required>

            <input type="submit" value="Delete">
        </form>
    </body>
</html>