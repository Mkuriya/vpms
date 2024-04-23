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
$guardnumber = $_POST['guardnumber'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];

//SQL query for updating data
$sql = "UPDATE guard_data SET firstname = :firstname, middlename = :middlename, lastname = :lastname WHERE guardnumber = :guardnumber";

//Prepare and execute the statement
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':guardnumber', $guardnumber);
$stmt->bindParam(':firstname', $firstname);
$stmt->bindParam(':middlename', $middlename);
$stmt->bindParam(':lastname', $lastname);

if($stmt->execute()){
    echo "Record updated successfully!";
    header("Location:viewguardacc.php");
}else {
    echo "Error updating record.";
}
?>