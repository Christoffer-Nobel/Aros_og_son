<?php

$conn = null;
//connect funktion, som i sammenhæng med de definerede konstanter i index skaber forbindelse til vores database
function connect() {
  global $conn;

  $conn = mysqli_connect(DBHOST, DBUSER, DBPASS);

  if(!$conn) {
    die(mysqli_error($conn));
  }

  mysqli_select_db($conn, DBNAME);
}
//Tager data fra databasen, fra siden med det id som er = $pid
function getPage($pid = null) {
  global $conn;

  if($pid != null) {
    $sql = 'SELECT * FROM pages WHERE id = "'. $pid . '"';
  } else {
    $sql = 'SELECT * FROM pages WHERE frontpage = 1';
  }

  $page = mysqli_query($conn, $sql);

  if(mysqli_num_rows($page) > 0) {
    return mysqli_fetch_assoc($page);
  }
  return false;
}

//Tager data fra databasens tabel med kunden når $pid er = 6 (altså kundesiden)
function getCusPage($pid = null) {
  global $conn;

  if($pid != null) {
    $sql = 'SELECT * FROM pages WHERE id = 6';
  }

  $page = mysqli_query($conn, $sql);

  if(mysqli_num_rows($page) > 0) {
    return mysqli_fetch_assoc($page);
  }
  return false;
}
//henter alle sider fra databasen hvor id er mindre end 5, for at kunne hive dem ud i navbaren
function getNav() {
  global $conn;

  $sql = 'SELECT id, title FROM pages WHERE id < 5';
  $result = mysqli_query($conn, $sql);
  $nav = [];

  if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $nav[] = $row;
    }
  }
  return $nav;
}

function debug($data) {
  echo '<pre>';
  print_r($data);
  echo '</pre>';
}
