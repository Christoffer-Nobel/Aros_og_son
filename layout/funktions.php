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
  mysqli_selec// vi laver ny funktion bed navn getNav
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
t_db($conn, DBNAME);
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
