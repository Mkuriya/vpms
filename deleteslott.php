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
if (isset($_GET['slotid'])) {
    $slotid = $_GET['slotid'];

    try {

        $query = "DELETE FROM `slot` WHERE `slotid` = '$slotid'";
        $statement = $pdo->prepare($query);
        $query_execute = $statement->execute();
        if ($query_execute) {
          header('Location:viewslot.php');
          exit(0);
        } else {
          header('Location:viewslot.php');
          exit(0);
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>