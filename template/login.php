<?php
define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "root");
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
      <h1>Login</h1>
        <input type="email" name="email" placeholder="E-mail" required><br>
        <input type="password" name="password" placeholder="Kodeord" required><br>
        <input type="submit" name="btnlogin" value="Login">
      <a id="nybruger" href="./customers.php">Ny bruger</a>

<?php
      if(isset($_POST['btnlogin']))
      {
      //sætter den indskrevne email og password i en variabel
          $uname = $_POST['email'];
          $pass = $_POST['password'];
        //  $password = hash('ripemd160' $pass);

        $sql = "SELECT * FROM employees";
        global $conn;
        $result = mysqli_query($conn, $sql);
        $users =[];
        if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result)){
            //array_push($products)
            $users[] = $row;
          }
          }

            for($i = 0; $i < count($users); $i++){
      //tjekker om det indskrevne email og password med vores hash passer med samme data fra hver bruger i vores array indtil den finder et match, og sætter her en variabel til velkommen, og en variabel til brugerens navn
              if($users[$i]['e_email'] == $uname && $users[$i]['password'] == $pass)
              {
                header("Location: ../index.php?p=1");

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
