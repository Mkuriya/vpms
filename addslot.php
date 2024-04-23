<?php
//database configuration
$host = `localhost`;
$dbname = 'vpms';
$username = 'root';
$password = '';

//Create a PDO instance
try{
    $pdo = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("Error: " . $e->getMessage());
}

// Retrieve data from the form
$platenumber = $_POST['platenumber'];
$selectdate = $_POST['selectdate'];
$starttime = $_POST['starttime'];
$selecthour = $_POST['selecthour'];

//SQL query for insertion
$sql = "INSERT INTO slot (platenumber, selectdate, starttime, selecthour) VALUES (:platenumber, :selectdate, :starttime, :selecthour)";

//Prepare and execute the statement
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':platenumber', $platenumber);
$stmt->bindParam(':selectdate', $selectdate);
$stmt->bindParam(':starttime', $starttime);
$stmt->bindParam(':selecthour', $selecthour);

if($stmt->execute()){
    echo "Record created successfully!";
   header ("Location:viewslot.php");
}else {
    echo "Error create record.";
}
?>