<?php
//Database configuration
$host = `localhost`;
$dbname= 'vpms';
$username = 'root';
$password = '';

//Create a PDO instance
try{
    $pdo = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die("Error: " .$e->getMessage());
}

//SQL query for selectring data
$sql = "SELECT * FROM guard_data";

//Execute the query and fetch data
$stmt = $pdo->query($sql);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <link rel="stylesheet" href="des.css">
    </head>
    <body>
    <div class="header">
    
    
    
    <div class="backk">
            <h1>Guard List</h1>
        <a href="viewguardacc.php"><button id="b_8">Back</button></a> 
        </div>
    </div>
     <?php
                     if(isset($_GET['id'])){
                        $guardnumber = $_GET['id'];

                        $query = "SELECT * FROM guard_data WHERE guardnumber=:id LIMIT 1";
                        $statement = $pdo->prepare($query);
                        $data = [':id' => $guardnumber];
                        $statement->execute($data);

                        $result = $statement->fetch(PDO::FETCH_OBJ);
                     }
                     ?>
       
        <form action="upguard.php" method="post">
        <h1>Update Admin Information</h1>
        
            <input type="hidden" name="guardnumber" id="guardnumber" value="<?= $result->guardnumber; ?>"><br><br>
        
            <label for="firstname">First Name:</label>
            <input type="text" name="firstname" id="firstname" value="<?= $result->firstname; ?>"><br><br>

            <label for="middlename">Middle Name:</label>
            <input type="text" name="middlename" id="middlename" value="<?= $result->middlename; ?>"><br><br>

            <label for="lastname">Last Name:</label>
            <input type="text" name="lastname" id="lastname" value="<?= $result->lastname; ?>"><br><br>

            <input type="submit" value="Update" id="ubtn">
        </form>
    </body>
</html>