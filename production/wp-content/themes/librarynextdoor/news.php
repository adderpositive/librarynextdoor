<?php
/*
Template Name: News
*/

get_header();

global $wp;

?>

  <section class="intro">
    <div class="inner intro__inner">
      <h1 class="heading"><?php the_title(); ?></h1>
    </div>
  </section>

  <div class="formatted">
    <div class="inner formatted__inner">
      <?php
        $postsQuery= array(
          'post_type' => 'post',
          'posts_per_page' => -1,
          'orderby' => 'date'
        );
        
        $posts = new WP_Query($postsQuery);
      
        if ($posts->have_posts()):
          while ($posts->have_posts()) :
            $posts->the_post();
      ?>
      
         <h2 class="formatted__heading"><?php the_title(); ?></h2>
         <?php the_content(); ?>
         <hr class='wp-block-separator' />
      <?php
          endwhile;
        endif;
        wp_reset_postdata(); 
      ?>     
    </div>
  </div>
 
    
<?php
  get_footer();
?>
