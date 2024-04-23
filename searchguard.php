<?php
//Database configutation
$host = `localhost`;
$dbname = 'vpms';
$username = 'root';
$password = '';

//Create a PDO instance
try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    die ("Error: " . $e->getMessage());
}

//Retireve search term from the URL query string
$search = $_GET['search'];

//SQL query for searching data
$sql = "SELECT * FROM guard_data WHERE firstname LIKE :search OR middlename LIKE :search OR lastname LIKE :search";

//Prepare and execute the statement
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':search' ,'%' . $search . '%');


$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
    <head>
    <title>Admin</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    
<div class="header">
        <a href="viewaccad.php"><button id="b1">View Admin Account</button></a>
        <a href="viewguardacc.php"><button id="b2">View Guard Account</button></a>
        <a href="accountset.php"><button id="b3">Accounts</button></a>
        <a href="logout.php"><button id="b4">Log-out</button></a>
    </div>
        <h1>Search Result</h1>
        <table>
            <tr>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
            </tr>
            <?php foreach ($result as $row):?>
                <tr>
                    <td><?php echo $row['firstname'];?></td>
                    <td><?php echo $row['middlename'];?></td>
                    <td><?php echo $row['lastname'];?></td>

                    			
                </tr>
                <?php endforeach; ?>
        </table>
    </body>
</html>