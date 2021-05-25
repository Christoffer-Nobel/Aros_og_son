
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Homepage</title>
        <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div id="header">
      <h6>header</h6>
      <img src="pokemon.jpg" align="left">
    <header>
      </div>
    <div id="navbar">
      <h6>navbar</h6>
    </div>
      <div id="row">
        <h6>row</h6>
      <div id="side">
        <h6>Side</h6>
  </div>
      <div id="main">
        <h6>main</h6>
  </div>
  <div id="maintext">
    <h6>maintext</h6>
  </div>
      </div>
      <div id="footer">
        <h6>footer</h6>
      <div id="left">
        <h6>left</h6>
  </div>
    <div id="middle">
      <h6>middle</h6>
  </div>
  <div id="right">
    <h6>middle</h6>
  </div>
  </div>
            <?php foreach(getNav() as $nav) { ?>
            <li>
              <a href="?p=<?php echo $nav['id']; ?>">
                <?php echo $nav['title']; ?>
              </a>
            </li>
          <?php } ?>
            </header>
