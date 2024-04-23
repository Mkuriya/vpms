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
        <div class="backk">
            
        <h1>Slot List</h1>
        <a href="viewslot.php"><button id="b-8">Back</button></a>
    </div>
    </div>
    <br>

<aside>
    <?php
         if(isset($_GET['id'])){
            $slotid = $_GET['id'];
            $query = "SELECT * FROM slot WHERE slotid=:id LIMIT 1";
            $statement = $pdo->prepare($query);
            $data = [':id' => $slotid];
            $statement->execute($data);
            $result = $statement->fetch(PDO::FETCH_OBJ);
         }
         ?>
        <form action="update.php" method="post">
        <h1>Update Slot Information</h1>
        
            <input type="hidden" name="slotid" id="slotid" value="<?= $result->slotid; ?>"><br><br>
        
            <label for="platenumber">Plate Number:</label>
            <input type="text" name="platenumber" id="platenumber" value="<?= $result->platenumber; ?>"><br><br>
        
            <label for="selectdate">Select Date:</label>
            <input type="text" name="selectdate" id="selectdate"value="<?= $result->selectdate; ?>" ><br><br>
        
            <label for="starttime">Start Time:</label>
            <input type="text" name="starttime" id="starttime" value="<?= $result->starttime; ?>"><br><br>
        
            <label for="selecthour">Select Hour:</label>
            <input type="text" name="selecthour" id="selecthour" value="<?= $result->selecthour; ?>"><br><br>

            <input type="submit" value="Update" id="ubtn">
        </form>
        </aside>
        

        
    </body>
</html>
