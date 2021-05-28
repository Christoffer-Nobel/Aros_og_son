<?php
//sætter en forbindelse op til databasen med nedenstående konstanter og connectfunktionen
define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "root");
define("DBNAME", "aros_og_son");

include("functions.php");

connect();

//hvis ?p= er sat i URLen, tager den data til den side og inkluderer template. Hvis ?t= er sat, gør den det samme bare med kunder. ellers henter den forsiden
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
  include('template/login.php');
}
