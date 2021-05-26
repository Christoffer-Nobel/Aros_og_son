<?php
define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "root");
define("DBNAME", "aros_og_son");

include("../functions.php");

connect();


$note = $_POST['notetext'];

$sql = "INSERT INTO note (note_text) VALUES ('$note');";
$result = mysqli_query($conn, $sql);
if (false===$result) {
  printf(mysqli_error($conn));
}

//header("Location: ../index.php?p=2");
