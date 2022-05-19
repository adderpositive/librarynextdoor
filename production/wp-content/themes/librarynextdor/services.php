<?php
/*
Template Name: Služby
*/

// data-wf-page 61f911878967fff44fd906a5


get_header();

global $wp;
the_post();

?>
 
    <div id="uvod" class="hero-section small wf-section">
      <div class="content-container hero-small">
        <h1 class="h1-heading">Služby, které vám zpříjemní každý den</h1>
        <p class="hero-paragraph-big">Spolu s rezidenčním bydlením v Ústí Towers získáte celou řadu služeb, které by vás
          v běžném bydlení stály hodiny času.</p>
      </div>
    </div>
    <div id="projekty" class="content-section wf-section">
      <div class="content-container services">
        <div class="service-card"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/web/images/reception-hotel-1.svg" loading="lazy" alt="" class="_24px-icon">
          <div class="service-text">
            <h6 class="service-heading">Recepce 24/7</h6>
            <p>Máte otázku k bydlení, potřebujete předat klíče návštěvě nebo třeba převzít balík? Recepční Ústí Towers
              je vám k dispozici 24 hodin denně 7 dní v týdnu.</p>
          </div>
        </div>
        <div class="service-card"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/web/images/parking-p-1-1.svg" loading="lazy" alt="" class="_24px-icon">
          <div class="service-text">
            <h6 class="service-heading">Parkování</h6>
            <p>Díky více než 200 parkovacím místům přímo u budovy odpadají starosti s hledáním parkování. Po příjezdu do
              areálu vždy najdete volné místo.</p>
          </div>
        </div>
        <div class="service-card"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/web/images/network-1-1.svg" loading="lazy" alt="" class="_24px-icon">
          <div class="service-text">
            <h6 class="service-heading">Internetové připojení</h6>
            <p>Váš byt už je teď vybavený WiFi s vysokorychlostním internetem. Díky hromadné smlouvě za nejvýhodnější
              možnou cenu.</p>
          </div>
        </div>
        <div class="service-card"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/web/images/cleaning-woman-1-1.svg" loading="lazy" alt="" class="_24px-icon">
          <div class="service-text">
            <h6 class="service-heading">Úklid společných prostor</h6>
            <p>Venkovní i vnitřní prostory jsou vždy uklizené. Pravidelně také udržujeme zeleň okolo domu a odvážíme
              domovní odpad.</p>
          </div>
        </div>
        <div class="service-card no-margin"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/web/images/kitchen-storage-1.svg" loading="lazy" alt=""
            class="_24px-icon">
          <div class="service-text">
            <h6 class="service-heading">Kompletně vybavené byty</h6>
            <p>Kuchyňská linka, koupelna, SMART TV a sedačka, ale také příbory, povlečení nebo lampičky. Byty v Ústí
              Towers jsme kompletně vybavili, takže se můžete hned nastěhovat.</p>
          </div>
        </div>
        <div class="service-card no-margin"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/web/images/tools-wench-screwdriver-1.svg" loading="lazy" alt=""
            class="_24px-icon">
          <div class="service-text">
            <h6 class="service-heading">Správa a údržba budovy i apartmánů</h6>
            <p>Všechno v budově a okolí vždy perfektně funguje díky pravidelné údržbě. A v případě potřeby zajistíme
              také opravu vybavení apartmánů.</p>
          </div>
        </div>
      </div>
    </div>
    <div id="projekty" class="content-section wf-section">
      <div class="content-container">
        <div class="halved-block-wrap no-margin">
          <div class="halved-image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/web/images/istockphoto-1165384568-612x612.jpg" loading="lazy" alt=""
              class="image-in-halved">
            <div class="gray-image-bg-block"></div>
          </div>
          <div class="halved-text">
            <h3 class="h3-heading">Bydlíte ve městě a v přírodě zároveň</h3>
            <p>Vhodnější polohu bydlení v Ústí nenajdete. Dvě výškové budovy se nacházejí kousek od centra, ale zároveň
              téměř na hranicích CHKO České středohoří.</p>
            <a href="#" class="button-primary small-margin-bottom w-button">Více o lokalitě</a>
          </div>
        </div>
      </div>
    </div>
    
    <?php get_template_part('partials/form'); ?>
    
<?php
  get_footer();
?>
