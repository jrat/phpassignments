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
  if (mysql_query("CREATE DATABASE my_db",$con))
  {
    echo "Database created";
  }
  else
  {
    echo "Error creating database: " . mysql_error();
  }

  // Create table of people and their favorite cars
  mysql_select_db("my_db", $con);//select the db we want to add to first
  $sql = "CREATE TABLE Persons
  (
    personID int NOT NULL AUTO_INCREMENT, 
    PRIMARY KEY(personID),
    Name varchar(25),
    Fav_Car varchar(25)
  )";

  // Execute query
  mysql_query($sql,$con);

  //Close the connection
  mysql_close($con);
?>