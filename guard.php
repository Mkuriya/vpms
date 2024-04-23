<?php
session_start();
$host = `localhost`;
$dbname= 'vpms';
$username = 'root';
$password = '';
$default_username = 'admin';
$default_password = 'user123456';
try{
    $pdo = new PDO("mysql:host=$host; dbname=$dbname", $username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    
    echo "Error: " .$e->getMessage();
}

try{
   if(isset($_POST["login"])){
       if(empty($_POST["uname"]) || empty($_POST["pword"])){
      $message = '<label> All Fields are required </label>';
}else{
     $pdoQuery = "SELECT * FROM guard_data WHERE uname = :uname AND pword = :pword";
    $pdoResult = $pdo->prepare($pdoQuery);
    $pdoResult->execute(
             array(
                    'uname'   => $_POST["uname"],
                    'pword'    => $_POST["pword"]
            )
);
$count = $pdoResult-> rowCount();
if($count > 0){
     $_SESSION["uname"] = $_POST["uname"];
     header("location: guardhome.php");
}elseif ($_POST["uname"] === $default_username && $_POST["pword"] === $default_password) {
     // Match the default account
     $_SESSION["uname"] = $default_username;
     header("location: guardhome.php");
 }else{
                 $message = '<label>Wrong Data</label>';
               }
          }
      }
}
catch(PDOException $error)
{
     $message = $error ->getMessage();
}
?>


<!DOCTYPE html>
<html>
<head>
     <title>Guard</title>
     <Link rel="stylesheet" type="test/css" href="style.css">
     <link rel="stylesheet" href="style.css">
</head>
<body>
     <form method="POST">
          <h2>LOGIN</h2>
          <label>Username:</label>
          <input type="text" name="uname">

          <label> Password: </label>
          <input type="password" name="pword" >

          <button type="submit" name="login">login</buttom>
        </form>
</body>
</html>