<?php
//Database configutation
$host = `localhost`;
$dbname = 'vpms';
$username = 'root';
$password = '';
try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    die("Error: " . $e->getMessage());
}


if (isset($_GET['admin_num'])) {
    $admin_num = $_GET['admin_num'];

    try {

        $query = "DELETE FROM `admin_data` WHERE `admin_num` = '$admin_num'";
        $statement = $pdo->prepare($query);
        $query_execute = $statement->execute();
        if ($query_execute) {
          header('Location:viewaccad.php');
          exit(0);
        } else {
          header('Location:viewaccad.php');
          exit(0);
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>