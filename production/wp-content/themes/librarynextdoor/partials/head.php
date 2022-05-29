<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,700;0,800;1,400;1,700;1,800&display=swap" rel="stylesheet"> 

    <script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "Organization",
        "url": "<?php echo get_site_url(); ?>" ,
        "name": "<?php bloginfo('name'); ?> | <?php the_title(); ?>",
        "logo": "<?php echo get_stylesheet_directory_uri() . '/assets/img/logo.svg'; ?>",
        "contactPoint": {
            "@type": "ContactPoint",
            "email": "",
            "contactType": "Support"
        }
    }
    </script>

</head>
<body>
  <div>
