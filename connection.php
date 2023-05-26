
<?php
// session_start();
$_dsn="mysql:host=localhost;dbname=flight_reservation";
$user="root";
$password="";
$options=[];
try{ 
    $connection=new PDO($_dsn,$user,$password,$options);
  
        // echo("connection successful");
    }
catch(PDOException)
    {
        echo ("unsuccessful");
    }
?>