<?php include("header.php");
global $conn;

$pid = $_GET["t"];
$sql = "SELECT * from customeremployeerelations where customer_id = '$pid'";

$result = mysqli_query($conn, $sql);
$cus = [];
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
    $cus[] = $row;
}
}
?>

<body>
  <h1><?php echo "Navn: " . $cus[0]["firstname"] . " " . $cus[0]["lastname"]; ?></h1>
  <h2> <?php echo "Kunde nr: 0000" . $cus[0]["customer_id"];?>
  <br>
  <h2> <?php echo "Firma: " . $cus[0]["company_name"]; ?>
  <br>
  <h2> <?php echo "Email: " . $cus[0]["email"]; ?>
  <br>
  <h2> <?php echo "Tlf: " . $cus[0]["phone_number"]; ?>
<br><br>
<?php echo "Rådgivere:" ?> <h3>
  <?php foreach($cus as $emp) {
    echo $emp["e_firstname"];
    ?> <br> <?php
  }
  ?> </h3>

<h2> Noter til kunde: </h2>
<form action="template/singleCus.inc.php" method="post">
<textarea>Skriv note her</textarea>
<input type="submit" name="note" value="Tilføj note">
</form>


</body>
</html>

<?php include("footer.php");
