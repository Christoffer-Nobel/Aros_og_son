<?php include('header.php'); ?>

  <h2><?php echo $page['title']; ?></h2>
<table>
<tr>
  <th>Navn</th>
  <th>Virksomhed</th>
  <th>E-mail</th>
  <th>Tlf</th>
</tr>
<?php
    //henter alt data om kunderne i viewet "customerlist", og displayer ønskede data i en tabel ved at loope gennem hver kunde (navnet sættes til at være et link til kundens tilhørende side)
$sql = "SELECT * FROM customerlist";
global $conn;
$result = mysqli_query($conn, $sql);

echo "<table>";
while($row = mysqli_fetch_array($result)){   ?>
<tr><td><a id="navnlink" href="?t=<?php echo $row["customer_id"]; ?>"><?php echo $row['firstname'] . " " . $row['lastname']?></a><?php
echo "</td><td>" . $row['company_name'] . "</td><td>" . $row['email'] . "</td><td>" . $row['phone_number'] . "</td></tr>";
}

echo "</table>";
 ?>

</table>
<?php include('footer.php'); ?>
