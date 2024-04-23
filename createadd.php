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
$email = $_POST['email'];

//SQL query for insertion
$sql = "INSERT INTO admin_data (firstname, middlename, lastname, uname, pword, email) VALUES (:firstname, :middlename, :lastname, :uname, :pword, :email)";

//Prepare and execute the statement
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':firstname', $firstname);
$stmt->bindParam(':middlename' , $middlename);
$stmt->bindParam(':lastname' , $lastname);
$stmt->bindParam(':uname' , $uname);
$stmt->bindParam(':pword' , $pword);
$stmt->bindParam(':email' , $email);

if($stmt->execute()){
    echo "Record created successfully!";
   header ("Location:viewaccad.php");
}else {
    echo "Error create record.";
}
?>