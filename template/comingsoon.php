
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Forside</title>
        <link rel="stylesheet" href="css/style.css">
    <img id="image" src="css/logo.png" align="left">
  </head>
  <body>
    <div id="header">
      <h4><a href="index.php" id="logo">Aros & Søn ApS</a></h4>
      <div id="logoutright">
      <h4><a class="lefthover" href="template/login.php" id="logout">Log ud</a></h4>
        </div>
      </div>
    <header>
      </div>
    <div id="page">
    <div id="navbar">
                  <?php foreach(getNav() as $nav) { ?>
                  <li>
                    <a href="?p=<?php echo $nav['id']; ?>">
                      <?php echo $nav['title']; ?>
                    </a>
                  </li>
                <?php } ?>
                <a href="../comingsoon.php">Salg</a>
                <a href="../comingsoon.php">Opgaver</a>
              </div>
      <div id="side">
        <h1>Siden kommer snart. Vi arbejder på højtryk.</h6>