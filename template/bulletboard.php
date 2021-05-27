<?php include('header.php');
global $conn;
?>
<div class="Posts">
<h2><?php echo $page['title']; ?><h2>
<h2> Skriv et opslag: </h2>
<form  method="post">
<input type="number" name="empid" placeholder="Medarbjeder nr" required> <br>
<input type="text" name="title" placeholder="Titel" required><br>
<input type="text" name="posttext" placeholder="Tekst" required><br>
<input type="submit" name="makepost" value="Del"><br> <br>
</form>

<?php
$sql = "SELECT * from employeeposts where employee_id > 0 ORDER BY created_at DESC;";

$result = mysqli_query($conn, $sql);
$posts = [];
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
    $posts[] = $row;
  }
}
?><?php
foreach ($posts as $post) {
  echo $post['title']; ?> <br><div id="posttitle"> <?php
  echo $post['e_firstname'] . " " . $post['e_lastname'] . " - " . $post['department_name']; ?> </div> <br><div id="posttext"> <?php
  echo $post['bulletboard_text']; ?> </div><br><div id="postdate"> <?php
  echo $post['created_at']; ?> </div><br> <?php
?> <br><br> <?php
}

if(isset($_POST['makepost'])){
  $empid = $_POST['empid'];
  $title = $_POST['title'];
  $bulletboard_text = $_POST['posttext'];

  $sql = "INSERT INTO bulletboard (employee_id, title, bulletboard_text) VALUES ('$empid', '$title', '$bulletboard_text');";
  $result = mysqli_query($conn, $sql);
  if (false===$result) {
    printf(mysqli_error($conn));
  }
  header("Location: ./index.php?p=1");

}
?>
</div>

</body>
</html>

<?php include('footer.php'); ?>
