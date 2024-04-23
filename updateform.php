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
        <link rel="stylesheet" href="guardhome.css">
</head>
<body>
<div class="header">
    <div class="parking">
        
        <div class="backk">
    <h1>Parking List</h1>
        <a href="viewparking.php"><button id="b-8">Back</button></a>
    </div>
    </div>
    <br>
    <aside>  
        <?php
         if(isset($_GET['id'])){
            $id = $_GET['id'];
            $query = "SELECT * FROM parking WHERE id=:id LIMIT 1";
            $statement = $pdo->prepare($query);
            $data = [':id' => $id];
            $statement->execute($data);
            $result = $statement->fetch(PDO::FETCH_OBJ);
         }
         ?>

        <form action="updatepark.php" method="post">
        <h1>Update Parking Information</h1>
        
            <input type="hidden" name="id" id="id"value="<?= $result->id; ?>" ><br><br>
        
            <label for="slot">Slot Name:</label>
            <input type="text" name="slot" id="slot" value="<?= $result->slot; ?>"><br><br>

            <input type="submit" value="Update" id="ubtn">
        </form>
        </aside>

        
    </body>
</html>