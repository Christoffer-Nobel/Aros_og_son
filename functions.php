<?php

$conn = null;

function connect() {
  global $conn;

  $conn = mysqli_connect(DBHOST, DBUSER, DBPASS);

  if(!$conn) {
    die(mysqli_error($conn));
  }

  mysqli_select_db($conn, DBNAME);
}

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

function getCusPage($pid = null) {
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
