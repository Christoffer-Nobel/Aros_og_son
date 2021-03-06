<?php
define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "");
define("DBNAME", "aros_og_son");

include("../functions.php");

connect();
?>
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
    <form id="box" method="post">
      <h1>Ændre Adgangskode</h1>
        <input type="email" name="email" placeholder="E-mail" required><br>
        <input type="password" name="oldpassword" placeholder="Gammel adgangskode" required><br>
        <input type="password" name="newpassword" placeholder="Ny adgangskode" required> <br>
        <input type="password" name="repeatpassword" placeholder="Gentag ny adgangskode" required> <br>
        <input type="submit" name="btnlogin" value="Opdater bruger">
      <a id="nybruger" href="../index.php">Tilbage til Login</a>

<?php
      if(isset($_POST['btnlogin']))
      {
      //sætter de indskrevne data i en variabler og hasher kodeordet
          $uname = $_POST['email'];
          $oldpass = $_POST['oldpassword'];
          $oldhashpass = hash('ripemd160', $oldpass);
          $pass = $_POST['newpassword'];
          $newpass = hash('ripemd160', $pass);
          $repeatpass = $_POST['repeatpassword'];

          //henter data fra tabellen om emplayees
        $sql = "SELECT * FROM employees";
        global $conn;
        $result = mysqli_query($conn, $sql);
        $users =[];
        if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result)){
            $users[] = $row;
          }
          }

            for($i = 0; $i < count($users); $i++){
              $empid = $users[$i]['employee_id'];
      //tjekker om det indskrevne email og password passer med samme data fra hver bruger i vores array, enten hvis den er hashet eller ikke hashet (gør det muligt at kopiere den hashede kode for at lave en ny), indtil den finder et match, og sætter her en variabel til velkommen, og en variabel til brugerens navn
              if($users[$i]['e_email'] == $uname && $users[$i]['password'] == $oldpass && $pass == $repeatpass or $users[$i]['e_email'] == $uname && $users[$i]['password'] == $oldhashpass && $pass == $repeatpass)
              {
                $sql = "UPDATE employees SET password = '$newpass' WHERE employee_id = $empid;";
                $result = mysqli_query($conn, $sql);
                if (false===$result) {
                  printf(mysqli_error($conn));
                }

                $name = $users[$i]["e_firstname"] . " " .  $users[$i]["e_lastname"];
                  $msg = "Adgangskode til " . $name . " er opdateret til";
                  break;
      //Hvis den ikke finder et match sættes en variabel, til "forkert" og variblen med navn til ingenting
    }else
              {
                 $msg = "Kunne ikke opdatere bruger. Prøv igen.";
              }
          }
          ?> <p id="message"> <?php  echo $msg?></p><?PHP
          }
  ?>
  </body>
</html>
