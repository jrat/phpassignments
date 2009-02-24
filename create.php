<?php
  ini_set("display_errors","2");
  ERROR_REPORTING(E_ALL);

  include('db_login.php');
  //Create connection
  $con = mysql_connect($db_host, $db_username, $db_password);

  if (!$con)
  {
    die('Could not connect: ' . mysql_error());
  }

  // Create database
  if (mysql_query("CREATE DATABASE p3_db",$con))
  {
    echo "Database created";
  }
  else
  {
    echo "Error creating database: " . mysql_error();
  }

  // Create table of woody allen flicks
  mysql_select_db("p3_db", $con);
  $sql = "CREATE TABLE Woody_Flicks
  (
    flickID int NOT NULL AUTO_INCREMENT, 
    PRIMARY KEY(flickID),
    Title varchar(25),
    Release_Date int
  )";
  // Execute query
  mysql_query($sql,$con);

  $sql = "CREATE TABLE Accolades
  (
    accolID int NOT NULL AUTO_INCREMENT, 
    PRIMARY KEY(accolID),
    Name varchar(25)
  )";
  // Execute query
  mysql_query($sql,$con);
  

  //Close the connection
  mysql_close($con);
?>
