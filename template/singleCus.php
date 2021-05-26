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
  <h2><?php echo $cus[0]["firstname"]; ?></h2>

</body>
</html>

<?php include("footer.php");
