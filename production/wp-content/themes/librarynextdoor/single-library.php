<?php

get_header();

global $wp;

?>

  <section class="intro">
    <div class="inner intro__inner">
      <h1 class="heading"><?php the_title(); ?></h1>
      <div class="intro-tags">
        <div class="tag tag--big">Udržitelnost</div>
        <div class="tag tag--big">Komunita</div>
        <div class="tag tag--big">Senioři</div>
      </div>
      <div class="intro__par">
        <a href="#">www.knihovna.xyz</a><br />
        Mariánské náměstí 1/98, Praha 1<br /><br />
        <?php the_content(); ?>
      </div>
    </div>
  </section>

  <div class="inner projects-inner">
  <section class="projects">
    <h2 class="projects__heading">Projects</h2>
    <div class="projects__wrap">
      <article class="projects-item">
        <h3 class="projects-item__heading">Název projektu</h3>
        <div class="projects-row">
          <span class="projects-row__title">Typ: </span>
          <span class="tag">Komunita</span>
          <span class="tag">Komunita</span>
        </div>
        <p class='projects__par'>Když se na něj klikne, tak se zobrazí popis projektu a kontaktní osoba.</p>
        <div class="projects-contact">
          <h4 class="projects-contact__title">Kontaktní osoba</h4>
          <p class="projects-contact__par">
            Martin Homola <br />
            <a href="mailto:example@ez.com">example@ez.com</a><br />
            <a href="tel:+420200200200">+420 200 200 200</a>
          </p>
        </div>
      </article>
      <article class="projects-item">
        <h3 class="projects-item__heading">Název projektu</h3>
        <div class="projects-row">
          <span class="projects-row__title">Typ: </span>
          <span class="tag">Komunita</span>
          <span class="tag">Komunita</span>
        </div>
        <p class='projects__par'>Když se na něj klikne, tak se zobrazí popis projektu a kontaktní osoba.</p>
        <div class="projects-contact">
          <h4 class="projects-contact__title">Kontaktní osoba</h4>
          <p class="projects-contact__par">
            Martin Homola <br />
            <a href="mailto:example@ez.com">example@ez.com</a><br />
            <a href="tel:+420200200200">+420 200 200 200</a>
          </p>
        </div>
      </article>
    </div>
  </section>
</div>
 
    
<?php
  get_footer();
?>
