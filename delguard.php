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

if (isset($_GET['guardnumber'])) {
    $guardnumber = $_GET['guardnumber'];

    try {

        $query = "DELETE FROM `guard_data` WHERE `guardnumber` = '$guardnumber'";
        $statement = $pdo->prepare($query);
        $query_execute = $statement->execute();
        if ($query_execute) {
          header('Location:viewguardacc.php');
          exit(0);
        } else {
          header('Location:viewguardacc.php');
          exit(0);
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>