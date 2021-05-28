<?php include('header.php'); ?>

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
    //henter alt data om medarbejderene i viewet "employeelist", og displayer ønskede data i en tabel ved at loope gennem hver kunde
    $sql = "SELECT * FROM employeelist";
    global $conn;
    $result = mysqli_query($conn, $sql);

    echo "<table>";

    while($row = mysqli_fetch_array($result)){
    echo "<tr><td>" . $row['e_firstname'] . " " . $row['e_lastname'] . "</td><td>" . $row['department_name'] . "</td><td>" . $row['e_email'] . "</td><td>" . $row['local_number'] . "</td><td>" . $row['teamsid'] . "</td></tr>";
    }

    echo "</table>";
     ?>

<?php include('footer.php'); ?>
