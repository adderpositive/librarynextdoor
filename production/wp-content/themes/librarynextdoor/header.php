<?php
    get_template_part( 'partials/head' );

    global $wp;

    $url = home_url( $wp->request );

    // menu
    $menuLocations = get_nav_menu_locations();

    // menu main
    $menuName = 'header';
    $menu = wp_get_nav_menu_object( $menuLocations[ $menuName ] );
    $menuItems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
?>

    <header id="header" class="header">
        <div class="inner header__inner">
            <a class="header__logo" href="<?php echo home_url(); ?>">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.svg" alt="Logo | <?php get_bloginfo('name'); ?>">
            </a>
            <ul class="header-menu">
                <?php
                    foreach( $menuItems as $item ):
                        $title = $item->title;
                        $link = $item->url;
                ?>
                    <li class="header-menu__item">
                        <a class="header-menu__link" href="<?php echo $link; ?>"><?php echo $title; ?></a>
                    </li>
                <?php 
                    endforeach;
                ?>
            </ul>
        </div>
    </header>
