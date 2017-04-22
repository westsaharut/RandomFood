<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "SEGroupProject";
  // $servername = "139.59.112.237:3306";
  // $username = "root";
  // $password = "0804221131";
  // $dbname = "SEGroupProject";
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  // else{
  //   echo "Connected";
  // }

  $conn->query("SET NAMES utf8");
?>
