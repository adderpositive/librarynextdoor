<?php
    get_template_part( 'partials/head' );

    global $wp;

    /*
    $url = home_url( $wp->request );

    // menu
    $menuLocations = get_nav_menu_locations();

    // menu main
    $menuName = 'header';
    $menu = wp_get_nav_menu_object( $menuLocations[ $menuName ] );
    $menuItems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );

    $menuItemsFull = array();

    foreach( $menuItems as $item ) {
        if( $item->menu_item_parent == 0) {
            array_push($menuItemsFull, $item);
        } else {
            $last = end( $menuItemsFull );
            $children = is_array( $last->children ) ? $last->children : array();
            array_push( $children, $item );

            $last->children = $children;
        }
    }
    */
?>

    <div data-w-id="a5e4dd83-ce30-af58-0f66-d76f6272c933" data-animation="default" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navbar w-nav">
      
    </div>
