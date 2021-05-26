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
    <form method="post">
      <input type="textarea" name="notetext">
      <input type="submit" value="Tilføj note">
    </form>

<?php

$sql = "SELECT * from customernotes where customer_id = '$pid' ORDER BY created_at DESC" ;

$result = mysqli_query($conn, $sql);
$notes = [];
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
    $notes[] = $row;
  }

  foreach ($notes as $singleNote) {
    echo $singleNote["created_at"];
      ?><br> <?php
    echo $singleNote["note_text"];
      ?><br> <?php  ?><br> <?php
  }
}
if(isset($_POST['notetext'])){
  $note = $_POST['notetext'];
  $cusId = $cus[0]["customer_id"];

  $sql = "INSERT INTO note (note_text, customer_id) VALUES ('$note', '$cusId');";
  $result = mysqli_query($conn, $sql);
  if (false===$result) {
    printf(mysqli_error($conn));
  }
  header("Location: ./index.php?p=2");

}
?>
</body>
</html>

<?php include("footer.php");
