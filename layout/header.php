<? // header er fast på de sider den bliver inkluderet på ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home</title>
  </head>
  <body>

    <nav>
      <ul>
        <?php foreach(getNav() as $nav) { ?>
          <? //for hvert element i arrayet "nav" udskriver vi til skærmen som link til hver enkel side ?>
          <li>
            <a href="?p=<?php echo $nav['id']; ?>">
              <?php echo $nav['title']; ?>
            </a>
          </li>
      <?php } ?>
      </ul>
    </nav>
