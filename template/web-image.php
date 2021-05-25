<?php include('header.php'); ?>
<!-- Vi inkludere header.php, efterfølgende echo via php titlen fra page, så sætter vi et billede ind og til sidst echo vi vore body tekst som vi har lavet i phpmyadmin -->
  <h2><?php echo $page['title']; ?><h2>
    <img id="profilbillede" src="https://scontent.fbll1-1.fna.fbcdn.net/v/t1.0-9/12540536_10205111836866635_7270491336878353646_n.jpg?_nc_cat=105&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=Dh3DQZmcXYEAX8ziZqo&_nc_ht=scontent.fbll1-1.fna&oh=5b4af31c40221611d659b2375493c7f6&oe=6070BD95">

    <p>
      <?php echo $page['body']; ?>
    </p>

<?php include('footer.php'); ?>
