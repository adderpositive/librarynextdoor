<?php

get_header();

global $wp;

?>

  <section class="intro">
    <div class="inner intro__inner">
      <h1 class="heading"><?php echo get_the_title( $post->post_parent ? $post->post_parent : $post->ID ); ?></h1>
    </div>
  </section>

  <?php
    $parent_page_id = ( '0' != $post->post_parent ? $post->post_parent : $post->ID );
    // Get child pages as array
    $page_tree_array = get_pages( array(
      'child_of' => $parent_page_id
    ) );

    if ($page_tree_array) : 
  ?>
  <div class="links">
    <ul class="inner links__inner">
      <?php 
        foreach ( $page_tree_array as $page ) :
      ?>
        <li class="links__item">
          <a class="links__link" href="<?php the_permalink($page->ID); ?>"><?php echo $page->post_title; ?></a>
        </li>
      <?php 
        endforeach;
      ?>
    </ul>
  </div>
  <?php 
    endif;
    wp_reset_postdata(); 
  ?>
  <div class="formatted">
    <div class="inner formatted__inner">
      <?php 
        if ($post->post_parent):
      ?>
         <h1 class="formatted__heading"><?php the_title(); ?></h1>
      <?php 
        endif;
      ?>     
      <?php the_content(); ?>
    </div>
  </div>
 
    
<?php
  get_footer();
?>
