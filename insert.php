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

  //Choose our DB
  mysql_select_db("my_db", $con);

  //Check whether this is an update or a new entry
  //Get all records and check to see if the current name equals an existing
//  if( $_POST[name] )

  $sql="INSERT INTO Persons (Name, Fav_Car)
  VALUES
  ('$_POST[name]','$_POST[fav_car]')";
  if (!mysql_query($sql,$con))
  {
    die('Error: ' . mysql_error());
  }
  echo "1 record added";
  mysql_close($con)
?>