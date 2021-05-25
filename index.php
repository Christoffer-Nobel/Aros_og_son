<?php
include("./functions.php");
include("./layout/header.php");
include("./layout/nav.php");
include("./layout/footer.php");

//Definer konstanter med databaseforbindelse info
define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "root");
define("DBNAME", "aros_og_son");

connect();

//test om vi er på forsiden
if(isset($_GET["p"])){
  $page = getPage($_GET["p"]);
}else {
  $page = getPage();
}

//Hvis siden ikke findes
if($page == false){
  //hvis siden ikke findes får vi "404" siden
  include("template/404.php");
  //ellers hvis siden findes og der findes et template til den includerer den template filen til siden
} elseif($page["template"] && file_exists("template/" . $page["template"])){
  include("template/" . $page["template"]);
  //ellers inkludere den default templatet
} else{
  include("template/login.php");
}

 ?>
