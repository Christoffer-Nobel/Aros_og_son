<?php

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">


  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <div id="Login">
    </div>
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
    <form id="box" method="post">
      <h1>Login</h1>
        <input type="email" name="email" placeholder="E-mail" required><br>
        <input type="password" name="password" placeholder="Kodeord" required><br>
        <input type="submit" name="btnlogin" value="Login">
      <a id="nybruger" href="./template/newPassword.php">Ændre adgangskode</a>

<?php
      if(isset($_POST['btnlogin']))
      {
      //sætter den indskrevne email og password i en variabel
          $uname = $_POST['email'];
          $password = $_POST['password'];
         $pass = hash('ripemd160', $password);

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
      //tjekker om det indskrevne email og password med vores hash passer med samme data fra hver bruger i vores array indtil den finder et match, og sætter her en variabel til velkommen, og en variabel til brugerens navn
              if($users[$i]['e_email'] == $uname && $users[$i]['password'] == $pass)
              {
                header("Location: ./index.php?p=1");

                  break;
              }
      //Hvis den ikke finder et match sættes en variabel, til "forkert" og variblen med navn til ingenting
              else
              {
                 $msg = "Forkert brugernavn eller adgangskode";
                 $name = null;
              }
          }
        ?> <p id="message"> <?php  echo $msg . $name; ?></p><?PHP
        }
?>

</body>
</html>
