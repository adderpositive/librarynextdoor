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

              $projects = get_field('projects');
              $title = get_the_title();
              $content = get_the_content();
              $type = get_field('type');
              $citySize = get_field('city_size');
              $address = get_field('address');
              $link = get_field('link');

              $topics = array();

              foreach ($projects as $project) {
                foreach ($project['topics'] as $topic) {
                  if (!in_array($topic, $topics)) {
                    array_push($topics, $topic);
                  }
                }
              }

          ?>
            <article class="projects-item projects-item--lib">
              <h3 class="projects-item__heading"><?php echo $title; ?></h3>
              <div class="projects-row">
                <span class="projects-row__title"><b>Type:</b> </span>
                <span class="tag"><?php echo $type; ?></span>
              </div>
              <div class="projects-row">
                <span class="projects-row__title"><b>Topics:</b> </span>
                <?php 
                  foreach ($topics as $topic):
                ?>
                <span class="tag"><?php echo $topic; ?></span>
                <?php 
                  endforeach;
                ?>
              </div>
              <div class='projects__par'><b>Address:</b> <?php echo $address['address']; ?></div>
              <div class='projects__par'><b>Link:</b> <a href="<?php echo $link; ?>" target='_blank'><?php echo $link; ?></a></div>
              <div class='projects__par'><?php echo $content; ?></div>
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
            $link = get_field('link');

            $projects = get_field('projects');
            $topics = array();

            foreach ($projects as $project) {
              foreach ($project['topics'] as $topic) {
                if (!in_array($topic, $topics)) {
                  array_push($topics, $topic);
                }
              }
            }
        ?>
          {
            title: '<?php echo $title; ?>',
            content: "<?php echo preg_replace("/\r\n|\r|\n/", '<br />', $content); ?>",
            type: '<?php echo $type; ?>',
            citySize: '<?php echo $citySize; ?>',
            latlng: [<?php echo $address['lat']; ?>, <?php echo $address['lng']; ?>],
            address: '<?php echo $address['address']; ?>',
            link: '<?php echo $link; ?>',
            detailUrl: '<?php the_permalink(get_the_ID()); ?>',

            topics: ['<?php echo join('\',\'', $topics); ?>'],

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
