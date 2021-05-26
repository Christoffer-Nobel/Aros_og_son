<?php include("header.php");
$sql = "SELECT * FROM customeremployeerelations"; //You don't need a ; like you do in SQL
global $conn;
$result = mysqli_query($conn, $sql);

?>

<body>
  <h2><?php echo $result[0]["fistname"]; ?></h2>

</body>
</html>

<?php include("footer.php"); 
/* <div id="proddiv">
  <img class="image" src="<?php echo $product[0]["img"]; ?>">
  <h3 id="prodinfo"><?php echo $product[0]["details"]; ?></h3>
</div>
<h3 id="prodprice"><?php echo "Pris: kr. " . $product[0]["price"]; ?></h3>
