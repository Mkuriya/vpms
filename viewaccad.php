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
$sql = "SELECT * FROM admin_data";

//Execute the query and fetch data
$stmt = $pdo->query($sql);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

session_start();
if(isset($_SESSION['uname'])){
    //echo '<h3>Login Success, Welcome - '.$_SESSION['aname']. '<\h3>';
    
}else{
      header("location: admin.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <link rel="stylesheet" href="homee.css">
        <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
 
</head>
<body>
    
<div class="header">
        <a href="viewaccad.php"><button id="b1">View Admin Account</button></a>
        <a href="viewguardacc.php"><button id="b2">View Guard Account</button></a>
        <a href="accountset.php"><button id="b3">Accounts</button></a>
        <a href="logout.php"><button id="b4">Log-out</button></a>
    </div>
        <h1>Admin List</h1>
        <table>
            <tr>
                
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
                <?php
                $query = "SELECT * FROM admin_data";
                $statement = $pdo->prepare($query);
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_OBJ);
                if($result){
                    foreach($result as $row ){
                    ?>
                <tr>
                    <td><?= $row->firstname;?></td>
                    <td><?= $row->middlename;?></td>
                    <td><?= $row->lastname;?></td>
                    <td><?= $row->email;?></td>
                    <td>
                        <a href="upadmin.php?id=<?=$row->admin_num; ?>" id="up">Update</a>
                        <form >
                        <button type="button" title="Delete" id="del" onclick="delete_admin(<?php echo $row->admin_num ?>)">Delete</button>
                        </form>
                    </td>
                </tr>
                        <?php
                    }
                }else{
                    ?><?php                
                } 
                ?>
                         
        </table>
        <div class="search">
        <form action="searchadd.php" method="get">
            <input type="text" name="search" id="search" required>
            
            <button type="submit" ><i class="fas fa-search"></i></button>
            </form>
            
        </div>
        <script>
       function delete_admin(id) {
        if (confirm("Do you want to delete this admin data?")) {
            window.location = "deleteadmin.php?admin_num=" + id;
        }

        }
</script>

    </body>
</html>