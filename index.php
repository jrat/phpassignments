<!--
Make a php file that SELECTs all of the records from across two tables AND a
linking table (a many-to-many relationship) and prints them to the screen in
a clear way (as you see fit).
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
<title>LCC 6313 Lab</title>
<h2>Exercise 1 Part 3</h2>
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
  //choose the db
  mysql_select_db("p3_db", $con);
?>
<h3>Woody Allen Movies</h3>
<?
  //Define the query
  $result = mysql_query("SELECT * FROM Woody_Flicks");
  echo "<table border=none>
  <tr>
  <th>Flick</th>
  <th>Release Date</th>
  </tr>";
  //Loop through each row
  while($row = mysql_fetch_array($result))
  {
     echo "<tr>";
     echo "<td>" . $row['Title'] . "</td>";
     echo "<td>" . $row['Release_Date'] . "</td>";
     echo "</tr>";
  }
?>

<h3>Awards Movies Get</h3>

<?
  $result2 = mysql_query("SELECT * FROM Accolades");
  echo "<table border=none>
  <tr>
  <th>Award</th>
  </tr>";
  //Loop through each row
  while($row = mysql_fetch_array($result2))
  {
   echo "<tr>";
   echo "<td>" . $row['Name'] . "</td>";
   echo "</tr>";
  }
?>

<br /><br /><br /><br />
<h3>Woody Allen Movies that Won Awards</h3>

<?
  $result3 = mysql_query("SELECT Woody_Flicks.Title, Accolades.Name FROM Woody_Flicks LEFT JOIN Awarded_Flicks ON Woody_Flicks.flickID = Awarded_Flicks.flkID LEFT JOIN Accolades ON Awarded_Flicks.accID = Accolades.accolID;");
  echo "<table border=none>
  <tr>
  <th>Woody Allen Flick</th>
  <th>Award</th>
  </tr>";
  //Loop through each row
  while($row = mysql_fetch_array($result3))
  {
   echo "<tr>";
   echo "<td>" . $row['Title'] . "</td>";
   echo "<td>" . $row['Name'] . "</td>";
   echo "</tr>";
  }
  mysql_close($con);
?>

<br /><br /><br /><br />

</body>
</html>
