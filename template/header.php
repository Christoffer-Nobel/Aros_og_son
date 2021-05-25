
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div id="header">
    <link rel="stylesheet" href="css/style.css">
    <header>
      <div id="navbar">
      <nav class="topnav">
        <div class="leftnav">
          <ul>
            <?php foreach(getNav() as $nav) { ?>
            <li>
              <a href="?p=<?php echo $nav['id']; ?>">
                <?php echo $nav['title']; ?>
              </a>
            </li>
          <?php } ?>
          </ul>
        </div>
      </nav>
    </header>
