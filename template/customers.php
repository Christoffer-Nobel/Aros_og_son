<?php include('header.php'); ?>
<!-- Vi inkludere header.php, efterfølgende echo via php titlen fra page, så sætter vi et billede ind og til sidst echo vi vore body tekst som vi har lavet i phpmyadmin -->
  <h2><?php echo $page['title']; ?></h2>
<table>
<tr>
  <th>Navn</th>
  <th>Virksomhed</th>
  <th>E-mail</th>
  <th>Tlf</th>
</tr>
<?php
$sql = "SELECT * FROM customerlist"; //You don't need a ; like you do in SQL
global $conn;
$result = mysqli_query($conn, $sql);

echo "<table>"; // start a table tag in the HTML
while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results?>
<tr><td><a href="?t=<?php echo $row["customer_id"]; ?>">Vis mere</a> <?php
echo "<td>" . $row['firstname'] . " " . $row['lastname'] . "</td><td>" . $row['company_name'] . "</td><td>" . $row['email'] . "</td><td>" . $row['phone_number'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML
 ?>

</table>
<?php include('footer.php'); ?>
