<?php

define( 'version',  '0.0.2' ); // time()
// define( 'app_url', 'https://man-credit-prod.herokuapp.com/api/public/lead' );

add_theme_support( 'post-thumbnails' );

function enqueue_styles() {

    if ( !is_admin() ) {
        wp_enqueue_style('map-plugin',  'https://unpkg.com/leaflet@1.8.0/dist/leaflet.css', [], version, 'all');
        wp_enqueue_style('style', get_stylesheet_directory_uri() . '/assets/css/style.css', [], version, 'all');
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

    /*
    wp_enqueue_script(
        'jquery1',
        'https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=61f3d19d266dc204d2d61f67',
        [],
        version,
        true
    );
    */
    
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
        [],
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

/*
function getData( object $data ) {
    global $wpdb;

    $tableName = $wpdb->prefix . "byty";

    $results = $wpdb->get_results('SELECT * FROM ' . $tableName);

    $response = json_encode( array('data' => $results) );
   
    return json_decode($response);
}

function rezervaceData( ) {
    register_rest_route( 'data', '/data', array(
		'methods'  => 'GET',
		'callback' => 'getData'
	) );
}

add_action( 'rest_api_init', 'rezervaceData' );
*/

function create_post( $data ) {

    check_ajax_referer( 'nonce' );

    wp_insert_post(
        array(
            'post_title' => $_POST['title'],
            'post_content' => $_POST['title'],
            'post_type' => 'library',
            'post_status' => 'draft'
            // 'meta_input'   
        )
    );


    die();
}

add_action( 'wp_ajax_create_post', 'create_post' );
add_action( 'wp_ajax_nopriv_create_post', 'create_post' );

function send_email() {
    /*

     $to = 'adder10@gmail.com';
        // Subject
    $subject = 'Rezervace ' . $_POST['name'];

    // Message
    $message = '
    <html>
    <head>
      <title>Rezervace - '. $_POST['name'] . '</title>
    </head>
    <body>
        <div style="max-width: 700px; padding: 0 20px; margin: 50px auto 80px;">
            <h1 style="font-size: 30px; text-align: center; padding-bottom: 20px;">Rezervační formulář '. $_POST['nameOrder'] . '</h1>
            <hr />
            <h2 style="font-size: 22px;">Údaje o oslavě</h2>
            <p>Jméno: <b>' . $_POST['name'] . '</b></p>
            <p>Email: <b>' . $_POST['email'] . '</b></p>
            <p>Tel. č.: <b>' . $_POST['phone'] . '</b></p>
    
        </div>
    </body>
    </html>
    ';

    // To send HTML mail, the Content-type header must be set
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=utf-8';
    $headers[] = "From:<" . $_POST['email'] . ">\r\n";

    // Mail it
    try {
        mail($to, $subject, $message, implode("\r\n", $headers));

        echo json_encode(
            array(
                'type' => 'success'
            )
        );

    } catch ( Exception $e)  {
        echo json_encode($e->getMessage());
    }
    */
}

/*

<?php
  function requestData($category) {
    $url = 'https://advertialabs.cz/advertia-admin/index.php/wp-json/wp/v2/' . $category;
    // $url = 'http://admin.advertia.drdek.cz/index.php/wp-json/wp/v2/' . $category;

    // create curl resource
    $request = curl_init();

    // set url
    curl_setopt($request, CURLOPT_URL, $url);

    //return the transfer as a string
    curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($request, CURLOPT_FAILONERROR, true);

    // $output contains the output string
    $output = curl_exec($request);

    if (curl_errno($request)) {
      $error = curl_error($request);
    }

    // error from hr system
    $json = json_decode($output, true);

    // close curl resource to free up system resources
    curl_close($request);

    if (isset($error)) {
      print_r($error);
    }

    return $json;
  }

  function requestDataAcf($category) {
    $url = 'https://advertialabs.cz/advertia-admin/index.php/wp-json/acf/v3/' . $category;
    $url = 'http://admin.advertia.drdek.cz/index.php/wp-json/acf/v3/' . $category;

    // create curl resource
    $request = curl_init();

    // set url
    curl_setopt($request, CURLOPT_URL, $url);

    //return the transfer as a string
    curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($request, CURLOPT_FAILONERROR, true);

    // $output contains the output string
    $output = curl_exec($request);

    if (curl_errno($request)) {
      $error = curl_error($request);
    }

    // error from hr system
    $json = json_decode($output, true);

    // close curl resource to free up system resources
    curl_close($request);

    if (isset($error)) {
      print_r($error);
    }

    return $json;
  }


*/
