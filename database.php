<?php
  $servername='localhost'
  $username='file'
  $password='file123'
  $dbname='file'
  $conn=mysqli_connect($servername,$username,$password, "$dbname");
  if(!$conn){
    die('Wir konnten keine Verbindung mit der Datenbank herstellen! Error Code:' .mysql_error())
  }
 ?>
