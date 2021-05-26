<!DOCTYPE html>
<html lang="en" dir="ltr">


  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <div id="Login">
    </div>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <form id="box" action="default.php" method="post">
      <h1>Login</h1>
        <input type="text" name="" placeholder="E-mail">
        <input type="text" name="" placeholder="Kodeord">
        <input type="submit" name="" value="Login" href="../template/index.php">
      <a id="nybruger" href="./customers.php">Ny bruger</a>

<?php
      if(isset($_POST['btnlogin']))
      {
      //sætter den indskrevne email og password i en variabel
          $uname = $_POST['email'];
          $pass = $_POST['password'];
          $password = hash('ripemd160', $pass);
          $users = getUser($uname);


            for($i = 0; $i < count($users); $i++){
      //tjekker om det indskrevne email og password med vores hash passer med samme data fra hver bruger i vores array indtil den finder et match, og sætter her en variabel til velkommen, og en variabel til brugerens navn
              if($users[$i]['email'] == $uname && $users[$i]['password'] == $password)
              {
                  $msg = "<p>Velkommen</p>";
                  $name = $users[$i]["name"];

                  break;
              }
      //Hvis den ikke finder et match sættes en variabel, til "forkert" og variblen med navn til ingenting
              else
              {
                 $msg = "<p>Forkert brugernavn eller adgangskode</p>";
                 $name = null;
              }
          }
          echo $msg . $name;
        }
?>

  </body>
</html>
