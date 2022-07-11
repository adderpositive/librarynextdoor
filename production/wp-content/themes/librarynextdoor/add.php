<?php
/*
Template Name: Přidání knihovny
*/

$librariesArgs = array(
  'post_type' => 'library',
  'posts_per_page' => -1,
  'orderby' => 'date'
);

$libraries = new WP_Query($librariesArgs);

get_header();
acf_form_head();
global $wp;

the_post();

?>

    <div id="uvod" class="hero-section wf-section">
      <div id="map"></div>
    </div>

    <div class='' style='max-width: 800px; margin: 50px auto;'>
        <?php
            acf_form(array(
                'post_id'       => 'new_post',
                'post_title'	=> true,
                'post_content'	=> true,
                'new_post'		=> array(
                    'post_type'		=> 'library',
                    'post_status'	=> 'draft'
                ),
                'submit_value' => 'Přidat'
            ));
        ?>
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
            latlng: [<?php echo $address['lat']; ?>, <?php echo $address['lng']; ?>],
            address: '<?php echo $address['address']; ?>'
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
