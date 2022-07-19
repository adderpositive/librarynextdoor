<?php

define( 'version',  time() ); // time()

add_theme_support( 'post-thumbnails' );

function enqueue_styles() {

    if ( !is_admin() ) {
        wp_enqueue_style('map-plugin',  'https://unpkg.com/leaflet@1.8.0/dist/leaflet.css', [], version, 'all');
        wp_enqueue_style('style', get_stylesheet_directory_uri() . '/assets/css/style.css', [], version, 'all');
        wp_enqueue_style('print', get_stylesheet_directory_uri() . '/assets/css/print.css', [], version, 'print');
    }
}
add_action( 'wp_enqueue_scripts', 'enqueue_styles');

function enqueue_scripts() {

    $url_data = array(
        'urlTheme' => get_stylesheet_directory_uri(),
        'urlWebsite' => esc_url( home_url() ),
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'nonce' => wp_create_nonce( 'nonce' ),
    );
    
    wp_enqueue_script(
        'map-plugin',
        'https://unpkg.com/leaflet@1.8.0/dist/leaflet.js',
        [],
        version,
        true
    );

    wp_enqueue_script(
        'main-script',
        get_stylesheet_directory_uri() . '/assets/js/map.js',
        ['map-plugin'],
        version,
        true
    );

    wp_localize_script('main-script', 'script_data', $url_data);
    wp_enqueue_script('main-script');
}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );

function header_footer_setup() {
    register_nav_menus( array(
        'header' => 'Header',
        'footer' => 'Footer',
    ) );
}
add_action( 'after_setup_theme', 'header_footer_setup' );

function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}

/************************************************************************************/
/* Remove wpcf7-form-control-wrap */
/************************************************************************************/
add_filter('wpcf7_form_elements', function ($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});

add_filter('wpcf7_autop_or_not', '__return_false');

function create_posts() {
    register_post_type( 'library',
        array (
            'labels' => array(
                'name' => 'Libraries',
                'singular_name' => 'Libraries'
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'show_in_rest' => 'true',
            // 'public' => false,  // it's not public, it shouldn't have it's own permalink, and so on
            'publicly_queryable' => true,  // you should be able to query it
        )
    );
}
add_action( 'init', 'create_posts' );