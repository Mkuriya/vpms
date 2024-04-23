<?php
//Database configuration
$host = `localhost`;
$dbname = 'vpms';
$username = 'root';
$password = '';

//Create a PDO instance 
try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    die("Error: " . $e->getMessage());
}

//Retrieve data from the form 
$slotid = $_POST['slotid'];
$platenumber = $_POST['platenumber'];
$selectdate = $_POST['selectdate'];
$starttime = $_POST['starttime'];
$selecthour = $_POST['selecthour'];

//SQL query for updating data
$sql = "UPDATE slot SET platenumber = :platenumber, selectdate = :selectdate, starttime = :starttime, selecthour = :selecthour WHERE slotid = :slotid";

//Prepare and execute the statement
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':slotid', $slotid);
$stmt->bindParam(':platenumber', $platenumber);
$stmt->bindParam(':selectdate', $selectdate);
$stmt->bindParam(':starttime', $starttime);
$stmt->bindParam(':selecthour', $selecthour);

if($stmt->execute()){
    echo "Record updated successfully!";
    header("Location:viewslot.php");
}else {
    echo "Error updating record.";
}
?>