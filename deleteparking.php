<?php
//Database configutation
$host = `localhost`;
$dbname = 'vpms';
$username = 'root';
$password = '';

//Create a PDO instance
try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    die("Error: " . $e->getMessage());
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {

        $query = "DELETE FROM `parking` WHERE `id` = '$id'";
        $statement = $pdo->prepare($query);
        $query_execute = $statement->execute();
        if ($query_execute) {
          header('Location:viewparking.php');
          exit(0);
        } else {
          header('Location:viewparking.php');
          exit(0);
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>