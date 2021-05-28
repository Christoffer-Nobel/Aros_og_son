<?php include("header.php");
?>
<div id="customersingle">
<?php
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
<div id="customerinfo"
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
    echo $emp["e_firstname"] . " " . $emp["e_lastname"] . " - " . $emp["e_email"];
      ?> <br> <?php
  }
?> </h3>
</div>
<div id="customernotefileinput">
  <h2> Noter til kunde: </h2>
    <form method="post">
      <input type="textarea" name="notetext" placeholder="Indtast note her...">
      <input type="submit" value="Tilføj note">
    </form>
    <h2> Filer: </h2>
    <form method="post" enctype="multipart/form-data">
      <input type="text" name="filename" placeholder="Titel" required>
      <input type="file" name="file" required>
      <input type="submit" value="Tilføj fil" name="upload">
    </form>
</div>
<div id="customernotes">
  <h2> Noter: </h2>
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
</div>
</div>
</body>
</html>

<?php include("footer.php");
