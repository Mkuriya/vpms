<?php
         session_start();
         unset($_SESSION['id']); // Remove the argument from session_unset
         session_destroy();
         header('location:admin.php');
?>