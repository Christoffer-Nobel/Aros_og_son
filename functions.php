<?php

$conn = null;

//funktionen til at forbinde databasen
function connect(){

  //sikrer at variablen er den globale på linje 3
  global $conn;

  //Opretter den faktiske database forbindelse
  $conn = mysqli_connect(DBHOST, DBUSER, DBPASS);

  //tester om  der er fejl i databaseforbindelse
 if(!$conn){
  die(mysqli_error($conn));
  }

  //vælge den database vi gerne vil bruge
  mysqli_select_db($conn, DBNAME);
}
