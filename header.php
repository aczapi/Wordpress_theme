<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <div class="container">

    <!-- site-header -->

    <header class='site-header'>

      <nav class="site-nav">

        <div class="logo"></div>

        <?php
        if (has_custom_logo()) {
          the_custom_logo();
        } else {
        ?>
          <a class="logo" href="<?php echo get_home_url('/') ?>"><?php bloginfo('name'); ?></a>
        <?php } ?>

        <div class="nav-links">
          <?php
          $args = array(
            'theme_location' => 'primary'
          );


          ?>

          <?php wp_nav_menu($args); ?>

        </div>

        <div class="burger">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>



        <div class="nav-overlay"></div>
      </nav>

      <!-- <php if (get_header_image()) : ?>
        <div class="image-content background-image">
          <-- <a href="<php echo esc_url(home_url('/')); ?>" rel="home"> -->
      <!-- <img src="<php header_image(); ?>" width="<php echo esc_attr(get_custom_header()->width); ?>" height="<php echo esc_attr(get_custom_header()->height); ?>" alt="">
          <div class="headline"><span><php single_post_title(); ?></span></div>
          <-- </a> -->
  </div>
  <!-- <php endif; // End header image check.  -->
  <!-- ?>  -->

  </header>
  <!-- site-header -->