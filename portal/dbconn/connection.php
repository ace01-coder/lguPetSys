<?php

function dbconnect(){
   $sname = "localhost";
   $uname = "root";
   $pass  = "";
   $db  =  "lgupetsystem";

   $conn = new mysqli($sname,$uname,  $pass, $db);

   if($conn->connect_error){
      
      die("Connection failed". $conn->connect_error);
   }
   return $conn;
}

$conn = dbconnect();

if ($conn) {
    echo "Connected successfully!";
    // Remember to close the connection when done
    $conn->close();
}
?>