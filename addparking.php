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
$slot = $_POST['slot'];

//SQL query for insertion
$sql = "INSERT INTO parking (slot) VALUES (:slot)";

//Prepare and execute the statement
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':slot', $slot);

if($stmt->execute()){
    echo "Record created successfully!";
   header ("Location:viewparking.php");
}else {
    echo "Error create record.";
}
?>