<?php include('header.php'); ?>
<!-- Vi inkludere header.php, efterfølgende echo via php titlen fra page, så sætter vi et billede ind og til sidst echo vi vore body tekst som vi har lavet i phpmyadmin -->
  <h2><?php echo $page['title']; ?><h2>
    <img src="https://www.pngkey.com/png/full/221-2216537_graphic-transparent-library-collection-of-sign-high-clip.png">

    <p>
      <?php echo $page['body']; ?>
    </p>

<?php include('footer.php'); ?>
