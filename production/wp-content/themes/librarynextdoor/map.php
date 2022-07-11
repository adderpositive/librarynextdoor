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

get_header();
global $wp;

the_post();

?>  
    <section class="intro">
      <div class="inner intro__inner">
        <h1 class="heading"><?php echo get_the_title( $post->post_parent ? $post->post_parent : $post->ID ); ?></h1>
      </div>
    </section>

    <div id="uvod" class="hero-section wf-section">
      <div class='map' id="map"></div>
    </div>

    <div class="inner projects-inner">
      <section class="projects">
        <h2 class="projects__heading">List of libraries</h2>
        <div class="projects__wrap">
          <?php 
            while ($libraries->have_posts()) :
            $libraries->the_post();

              $title = get_the_title();
              $content = get_the_content();
              $type = get_field('type');
              $citySize = get_field('city_size');
              $address = get_field('address');

          ?>
            <article class="projects-item projects-item--lib">
              <h3 class="projects-item__heading"><?php echo $title; ?></h3>
              <div class="projects-row">
                <span class="projects-row__title">Type: </span>
                <span class="tag"><?php echo $type; ?></span>
              </div>
              <div class='projects__par'><?php echo $content; ?></div>
              <div class="projects-contact">
                <h4 class="projects-contact__title">Contact person</h4>
                <p class="projects-contact__par">
                  Martin Homola <br />
                  <a href="mailto:example@ez.com">example@ez.com</a><br />
                  <a href="tel:+420200200200">+420 200 200 200</a>
                </p>
              </div>
              <div class="button-wrap">
                <a class="button" href="<?php the_permalink( get_the_ID() ); ?>">Detail</a>
              </div>
            </article>
          <?php
            endwhile;
            wp_reset_postdata();
          ?>
        </div>
      </section>
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
