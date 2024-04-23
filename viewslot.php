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
$sql = "SELECT * FROM slot";

//Execute the query and fetch data
$stmt = $pdo->query($sql);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

session_start();
if(isset($_SESSION['uname'])){
}else{
      header("location: guard.php");
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Guard</title>
        <link rel="stylesheet" href="guardhomee.css">
        <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
 
</head>
<body>
    <div class="header">
        <a href="viewslot.php"><button id="b1">View Book Slot</button></a>
        <a href="viewparking.php"><button id="b2">View Parking </button></a>
        <a href="option.php"><button id="b3">Slots</button></a>
        <a href="logoutguard.php"><button id="b4">Log-out</button></a>
    </div>
    <div class="table">
        <h1>View Slot</h1>
        <table>
            <tr>
                
                <th>Plate Number</th>
                <th>Select Date</th>
                <th>Start Time</th>
                <th>Select Hours</th>
                <th>Action</th>
            </tr>
            <?php
                $query = "SELECT * FROM slot";
                $statement = $pdo->prepare($query);
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_OBJ);
                if($result){
                    foreach($result as $row ){
                    ?>
                <tr>
                    <td><?= $row->platenumber;?></td>
                    <td><?= $row->selectdate;?></td>
                    <td><?= $row->starttime;?></td>
                    <td><?= $row->selecthour;?></td>
                    <td>
                        <a href="updateslot.php?id=<?=$row->slotid; ?>" id="up">Update</a>
                        <form >
                        <button type="button" title="Delete" id="del" onclick="delete_slot(<?php echo $row->slotid ?>)">Delete</button>
                        </form>
                        <script>
                            function delete_slot(id) {
                                if (confirm("Do you want to delete this slot?")) {
                                    window.location = "deleteslott.php?slotid=" + id;
                                }

                                }
                        </script>
                    </td>
                </tr>
                        <?php
                    }
                }else{
                    ?><?php                
                } 
                ?>
        </table>
        </div>
    </body>
</html>