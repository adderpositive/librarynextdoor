<?php

get_header();

global $wp;

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

  <section class="intro">
    <div class="inner intro__inner">
      <h1 class="heading"><?php the_title(); ?></h1>
      <ul class="intro-tags">
        <?php 
          foreach ($topics as $topic):
        ?>
        <li class="tag tag--big"><?php echo $topic; ?></li>
        <?php 
          endforeach;
        ?>
      </ul>
      <div class="intro__par">
        City size: <?php echo $citySize; ?><br />
        Type: <?php echo $type; ?><br />
        <a href="<?php echo $link; ?>" target='_blank'><?php echo $link; ?></a><br />
        <?php echo $address['address']; ?><br /><br />
        <?php the_content(); ?>
      </div>
    </div>
  </section>

  <div class="inner projects-inner">
  <section class="projects">
    <h2 class="projects__heading">Projects</h2>
    <div class="projects__wrap">
      <?php 
        foreach ($projects as $project):      
      ?>
        <article class="projects-item">
          <h3 class="projects-item__heading"><?php echo $project['title']; ?></h3>
          <div class="projects-row">
            <span class="projects-row__title">Typ: </span>
            <?php 
              foreach ($project['topics'] as $topic):
            ?>
              <span class="tag"><?php echo $topic; ?></span>
            <?php 
              endforeach;
            ?>
          </div>
          <div class="projects-row">
            <span class="projects-row__title">Link: <a href="<?php echo $project['website']; ?>" target='_blank'><?php echo $project['website']; ?></a></span>
            
          </div>
          <p class='projects__par'><?php echo $project['info']; ?></p>
          <div class="projects-contact">
            <h4 class="projects-contact__title">Contact person</h4>
            <p class="projects-contact__par">
              <?php echo $project['contact_person']['full_name']; ?><br />
              <a href="mailto:<?php echo $project['contact_person']['email']; ?>"><?php echo $project['contact_person']['email']; ?></a><br />
              <a href="tel:<?php echo $project['contact_person']['phone_number']; ?>"><?php echo $project['contact_person']['phone_number']; ?></a>
            </p>
          </div>
        </article>
      <?php 
        endforeach;
      ?>
    </div>
  </section>
</div>
 
    
<?php
  get_footer();
?>
