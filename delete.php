<?php
   if(isset($_GET['id'])) 
   {
      $id = $_GET['id'];


      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "father's_info";

      // Create connection
      $connection = new mysqli($servername, $username, $password, $dbname);

      $sql = "DELETE FROM Clients WHERE id=$id";
      $connection ->query($sql);
    }

    header("Location: index.php");
    exit;
?>