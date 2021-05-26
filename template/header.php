
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Homepage</title>
        <link rel="stylesheet" href="css/style.css">
    <img id="image" src="css/logo.png" align="left">
  </head>
  <body>
    <div id="header">
      <h6>header</h6>
      <img src class="img-logo"="css/pictures/tihi.jpg" align="left">
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
              </div>
      <div id="side">
