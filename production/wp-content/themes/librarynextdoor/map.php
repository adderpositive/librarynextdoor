<?php
/*
Template Name: Map
*/

$librariesArgs = array(
  'post_type' => 'library',
  'posts_per_page' => -1,
  'orderby' => 'date'
);

$libraries = new WP_Query($librariesArgs);

/*

$carsArgs = array(
    'post_type' => 'detail-vozu',
    'posts_per_page' => -1,
    'orderby' => 'date'
);
$cars = new WP_Query( $carsArgs );
$countTitle = '';
$marks = array();
$models = array();
$transmissions = array();
$markActive = $_GET['znacka'];
$modelActive = $_GET['model'];
$transmissionActive = $_GET['prevodovka'];
$sortingActive = $_GET['razeni'];

while( $cars->have_posts() ) {
    $cars->the_post();
    $mark = get_field('znacka');
    $model = get_field('model');
    $transmission = get_field('prevodovka');

    if( !empty( $mark ) && !in_array( $mark, $marks )) {
        array_push( $marks, $mark );
    }

    if( !empty( $model ) && !in_array( $model, $models ) ) {
        array_push( $models, $model );
    }

    if( !empty( $transmission ) && !in_array( $transmission, $transmissions ) ) {
        array_push( $transmissions, $transmission );
    }
}

if( isset( $markActive ) ||
    isset( $modelActivee ) ||
    isset( $transmissionActive ) ||
    isset( $sortingActive )
) {

    // 'order' => 'DESC',

    $queryMeta = array(
        'relation' => 'AND'
    );

    if( isset( $markActive ) ) {
        array_push( $queryMeta, array(
            'key' => 'znacka',
            'value' =>  $markActive,
            'compare' => 'LIKE'
        ));
    }

    if( isset( $modelActive ) ) {
        array_push( $queryMeta, array(
            'key' => 'model',
            'value' =>  $modelActive,
            'compare' => 'LIKE'
        ));
    }

    if( isset( $transmissionActive ) ) {
        array_push( $queryMeta, array(
            'key' => 'prevodovka',
            'value' =>  $transmissionActive,
            'compare' => 'LIKE'
        ));
    }

    $carsNewArgs = array(
        'post_type' => 'detail-vozu',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
        'meta_query' => $queryMeta,
    );

    if( $sortingActive == 'nejstarsi' ) {
        $carsNewArgs['order'] = 'ASC';
    }

    if( $sortingActive == 'nejlevnejsi' ) {
        $carsNewArgs['meta_key'] = 'cena';
        $carsNewArgs['orderby'] = 'meta_value_num';
        $carsNewArgs['order'] = 'ASC';
    }

    if( $sortingActive == 'nejdrazsi' ) {
        $carsNewArgs['meta_key'] = 'cena';
        $carsNewArgs['orderby'] = 'meta_value_num';
    }

    $cars = new WP_Query( $carsNewArgs );
}

if( $cars->post_count == 1 ) {
    $countTitle .= 'Nalezen <strong>1 vůz</strong>';
} else if( $cars->post_count > 1 && $cars->post_count < 5 ) {
    $countTitle .= 'Nalezeny <strong>' . $cars->post_count . ' vozy</strong>';
} else {
    $countTitle .= 'Nalezeno <strong>' . $cars->post_count . ' vozů';
}

*/

get_header();

global $wp;
the_post();

?>

    <div id="uvod" class="hero-section wf-section">
      MAPY
      <div id="map"></div>
    </div>


    <script>
      var libraries = [
        <?php 
          while ($libraries->have_posts()) :
            $libraries->the_post();

            $title = get_the_title();
            $content = get_the_content();
            $type = get_field('type');
            $citySize = get_field('city_size');
            $address = get_field('address');

        ?>
          {
            title: '<?php echo $title; ?>',
            content: "<?php echo preg_replace("/\r\n|\r|\n/", '<br />', $content); ?>",
            type: '<?php echo $type; ?>',
            citySize: '<?php echo $citySize; ?>',
            latlng: [<?php echo $address['lat']; ?>, <?php echo $address['lng']; ?>]
          },
          
        <?php
          endwhile;
          wp_reset_postdata(); 
        ?>
      ]    
    </script>
<?php
  get_footer();
?>
