<!--
Create a form that INSERTs and UPDATEs information into a table in a database,
depending on whether the information is new (check the primary key), and
prints the table records above the form.
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
<title>LCC 6313 Lab</title>
<h2>Exercise 1 Part 2</h2>
</head>
<body>

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
  //Select the DB we want
  mysql_select_db("my_db", $con);
  
  //Display current state of DB above the form
  //Define the query
  $result = mysql_query("SELECT * FROM Persons");
  
  echo "<table border=none>
  <tr>
  <th>Name</th>
  <th>Favorite Car</th>
  </tr>";
  //Loop through each row
  while($row = mysql_fetch_array($result))
  {
    echo "<tr>";
    echo "<td>" . $row['Name'] . "</td>";
    echo "<td>" . $row['Fav_Car'] . "</td>";
    echo "</tr>";
  }

  mysql_close($con);
?>

<br /><br />
<form action="insert.php" method="post">
Name: <input type="text" name="name" />
Favorite Car: <input type="text" name="fav_car" />
<input type="submit" />
</form>

</body>
</html>


