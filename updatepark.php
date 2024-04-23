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
$id = $_POST['id'];
$slot = $_POST['slot'];

//SQL query for updating data
$sql = "UPDATE parking SET slot = :slot WHERE id = :id";

//Prepare and execute the statement
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->bindParam(':slot', $slot);

if($stmt->execute()){
    echo "Record updated successfully!";
    header("Location:viewparking.php");
}else {
    echo "Error updating record.";
}
?>