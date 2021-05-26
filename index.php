<?php

define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "");
define("DBNAME", "aros_og_son");

include("functions.php");

connect();

if(isset($_GET["p"])) {
  $page = getPage($_GET["p"]);
} elseif(isset($_GET["t"])){
  $page = getCusPage($_GET["t"]);
} else {
  $page = getPage();
}


if($page == false) {
  include('template/404.php');
} elseif($page['template'] && file_exists('template/' . $page['template'])) {
  include('template/' . $page['template']);
} else {
  include('template/default.php');
}
