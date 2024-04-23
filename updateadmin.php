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
$admin_num = $_POST['admin_num'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];

//SQL query for updating data
$sql = "UPDATE admin_data SET firstname = :firstname, middlename = :middlename, lastname = :lastname, email = :email WHERE admin_num = :admin_num";

//Prepare and execute the statement
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':admin_num', $admin_num);
$stmt->bindParam(':firstname', $firstname);
$stmt->bindParam(':middlename', $middlename);
$stmt->bindParam(':lastname', $lastname);
$stmt->bindParam(':email', $email);

if($stmt->execute()){
    echo "Record updated successfully!";
    header("Location:viewaccad.php");
}else {
    echo "Error updating record.";
}
?>