<?php include('header.php'); ?>
  <h2><?php echo $page['title']; ?><h2>
<?php
global $conn;
?>
<h2> Skriv et opslag: </h2>
<form  method="post">
<input type="number" name="empid" placeholder="Medarbjeder nr" required> <br>
<input type="text" name="title" placeholder="Titel" required><br>
<input type="text" name="posttext" placeholder="Tekst" required>
<input type="submit" name="makepost" value="Del"><br> <br>
</form>

<?php
$sql = "SELECT * from employeeposts where employee_id > 0";

$result = mysqli_query($conn, $sql);
$posts = [];
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
    $posts[] = $row;
  }
}
foreach ($posts as $post) {
  echo $post['e_firstname'] . " " . $post['e_lastname']; ?> <br> <?php
  echo $post['title']; ?> <br> <?php
  echo $post['bulletboard_text']; ?> <br> <?php
  echo $post['created_at']; ?> <br> <?php
?> <br> <br> <?php
}

if(isset($_POST['makepost'])){
  $empid = $_POST['empid'];
  $title = $_POST['title'];
  $bulletboard_text = $_POST['posttext'];

  $sql = "INSERT INTO note (employee_id, title, bulletboard_text) VALUES ('$empid', '$title', '$bulletboard_text');";
  $result = mysqli_query($conn, $sql);
  if (false===$result) {
    printf(mysqli_error($conn));
  }
  header("Location: ./index.php?p=1");

}
?>


</body>
</html>

<?php include('footer.php'); ?>
