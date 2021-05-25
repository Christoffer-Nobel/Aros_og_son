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
}

  function getPage($pid = null) {
    global $conn;

    //Test om denne side er defineret med id, ellers brug forsiden
    if($pid != null) {

      //SQL kald til en definetet side (kig på WHERE)
      $sql = 'SELECT * FROM pages WHERE id = "' . $pid . '"';
    } else {

      //SQL kald til en forside (kig WHERE)
      $sql = 'SELECT * FROM pages WHERE frontpage = 1';
    }

    //Foretag det faktiske kald til db baseret på valget med defineret side tidligere
    $page = mysqli_query($conn, $sql);

    //test om siden findes
    if(mysqli_num_rows($page) > 0) {

      //retuner sidens data
      return mysqli_fetch_assoc($page);
    }

    // Retuner fejl hvis siden ikke findes
    return false;
  }


function getCusPage($pid = null) {
  global $conn;

  //Test om denne side er defineret med id, ellers brug forsiden
  if($pid != null) {

    //SQL kald til en definetet side (kig på WHERE)
    $sql = 'SELECT * FROM  customers WHERE custumer_id = "' . $pid . '"';
  }

  //Foretag det faktiske kald til db baseret på valget med defineret side tidligere
  $page = mysqli_query($conn, $sql);

  if(mysqli_num_rows($page) > 0) {

    return mysqli_fetch_assoc($page);
  }

  return false;
}



// vi laver ny funktion bed navn getNav
function getNav() {
  //sætter variablen "conn" til at være global (den åbner $conn så den ikke kun funggere i funktionen, men kan hente data udefra)
  global $conn;
// tager titler og id'er fra alle vores sider og lægger i sql
  $sql = 'SELECT id, title FROM pages';
// sender en forspørgsel efter data til dabasen og samler det i result
  $result = mysqli_query($conn, $sql);
  // opretter et tomt array
  $nav = [];
//hvis antallet af rows i results er større end 0 eksekvere den while loopet
  if(mysqli_num_rows($result) > 0) {
    //
    while($row = mysqli_fetch_assoc($result)) {
      //sætter resultatet ind i det tomme array og samtidig sætter ind som kun id og titel
      $nav[] =$row;
    }
  }
  return $nav;
  // retunere resultatet
}


function debug($data)  {
echo '<pre>';
print_r($data);
echo '</pre>';
}
