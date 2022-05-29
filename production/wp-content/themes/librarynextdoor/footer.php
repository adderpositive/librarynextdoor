<?php

    global $wp;

    /*
    $url = home_url( $wp->request );

    // menu
    $menuLocations = get_nav_menu_locations();

    // menu main
    $menuName = 'footer';
    $menu = wp_get_nav_menu_object( $menuLocations[ $menuName ] );
    $menuItems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
    */
?>

   
<footer class="footer">
  <div class="inner footer__inner">
    <div class="footer__col footer__col--1">
      <a class="footer__logo" href="<?php echo home_url(); ?>">
        <img src='<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-colorful.svg' alt='Logo | <?php get_bloginfo('name'); ?>' />
      </a>
    </div>
    <div class="footer__col footer__col--2">
      <div class="footer__heading">Navigation</div>
      <ul class="footer-menu" >
        <li class="footer-menu__item">
          <a class="footer-menu__link" href="#">Map</a>
        </li>
        <li class="footer-menu__item">
          <a class="footer-menu__link" href="#">Info</a>
        </li>
        <li class="footer-menu__item">
          <a class="footer-menu__link" href="#">News</a>
        </li>
      </ul>
    </div>
    <div class="footer__col footer__col--3">
      <div class="footer__heading">About</div>
      <p class="footer__paragraph">About Match and meet your partner library. This is where the "libraries dating" site comes into being. 🙂 An online map of potential partners, libraries looking for counterparts abroad for exchanging information, planning joint activities, projects, internships and friendly visits. The map will be open to any organisation that wants to offer its skills and services, that will be happy to share its experience. We believe that this will make it easier for libraries to find the right partner for their project.
      </p>
    </div>
    <div class="footer-copy">
      <p class="footer-copy__paragraph">© 2022 Library next door – Die Bibliothek von nebenan</p>
      <p class="footer-copy__paragraph">
        <a href="#header">To the top &uarr;</a>
      </p>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
