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
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$uname = $_POST['uname'];
$pword = $_POST['pword'];

//SQL query for insertion
$sql = "INSERT INTO guard_data (firstname, middlename, lastname, uname, pword) VALUES (:firstname, :middlename, :lastname, :uname, :pword)";

//Prepare and execute the statement
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':firstname', $firstname);
$stmt->bindParam(':middlename' , $middlename);
$stmt->bindParam(':lastname' , $lastname);
$stmt->bindParam(':uname' , $uname);
$stmt->bindParam(':pword' , $pword);

if($stmt->execute()){
    echo "Record created successfully!";
   header ("Location:viewguardacc.php");
}else {
    echo "Error create record.";
}
?>