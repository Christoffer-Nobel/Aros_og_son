<?php include('header.php'); ?>
<!-- Vi inkludere header.php, efterfølgende echo via php titlen fra page, så sætter vi et billede ind og til sidst echo vi vore body tekst som vi har lavet i phpmyadmin -->
  <h2><?php echo $page['title']; ?><h2>
    <table>
    <tr>
      <th>Navn</th>
      <th>Afdeling</th>
      <th>E-mail</th>
      <th>Lokal  nummer</th>
      <th>Teams link</th>
    </tr>
    <?php
    $sql = "SELECT * FROM employeelist";
    global $conn;
    $result = mysqli_query($conn, $sql);

    echo "<table>";

    while($row = mysqli_fetch_array($result)){   
    echo "<tr><td>" . $row['e_firstname'] . " " . $row['e_lastname'] . "</td><td>" . $row['department_name'] . "</td><td>" . $row['e_email'] . "</td><td>" . $row['local_number'] . "</td><td>" . $row['teamsid'] . "</td></tr>";
    }

    echo "</table>"; //Close the table in HTML
     ?>

<?php include('footer.php'); ?>
