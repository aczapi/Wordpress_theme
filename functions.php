<?php


function pageBanner($args = NULL)
{
  if (!$args['title']) {
    $args['title'] = get_the_title();
  }
  if (!$args['subtitle']) {
    $args['subtitle'] = get_field('page_banner_subtitle');
  }
  if (!$args['photo']) {
    if (get_field('page_banner_background_image')) {
      $args['photo'] = get_field('page_banner_background_image');
    } else {
      $args['photo'] = ('https://www.agnieszkaczapiewska.pl/wp-content/uploads/2022/01/carl-heyerdahl-KE0nC8-58MQ-unsplash-1-scaled.jpg');
    }
  }
?>

  <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo']; ?>
    );"></div>
    
    <div class="page-banner__content container t-center c-white">
      <h1 class="headline headline--large">
        <div class="headline"><span><?php echo $args['title'] ?></span></div>
      </h1>
      <div class="page-banner__intro">
        <p><?php echo $args['subtitle'] ?></p>
      </div>

    </div>
  </div>

<?php }

function pageBannerMainPage($args = NULL)
{
  if (!$args['title']) {
    $args['title'] = do_shortcode("[programmerquotes count = 1]");
  }
  if (!$args['subtitle']) {
    $args['subtitle'] = get_field('page_banner_subtitle');
  }
  if (!$args['photo']) {
    if (get_field('page_banner_background_image')) {
      $args['photo'] = get_field('page_banner_background_image');
    } else {
      $args['photo'] = ('https://www.agnieszkaczapiewska.pl/wp-content/uploads/2022/01/carl-heyerdahl-KE0nC8-58MQ-unsplash-1-scaled.jpg');
    }
  }
?>

  <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo']; ?>
    );"></div>
   
    <div class="page-banner__content container t-center c-white">
      <h1 class="headline headline--large">
        <div class="headline-quote"><span><?php echo $args['title'] ?></span></div>
      </h1>
      <div class="page-banner__intro">
        <p><?php echo $args['subtitle'] ?></p>
      </div>

    </div>
  </div>

<?php }



//adding style.css
function learningWordPress_resources()
{
  wp_enqueue_style('font-della-respira', '//fonts.googleapis.com/css2?family=Della+Respira&display=swap');
  wp_enqueue_style('font-merriwather', '//fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap');
  wp_enqueue_style('font-do-hyeon', '//fonts.googleapis.com/css2?family=Do+Hyeon&display=swap');
  wp_enqueue_style('font-comforter-brush', '//fonts.googleapis.com/css2?family=Comforter+Brush&family=Quicksand:wght@300;400;500;600&display=swap');
  wp_enqueue_style('font-waterfall', '//fonts.googleapis.com/css2?family=Waterfall&display=swap');
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('style', get_stylesheet_uri());
  wp_enqueue_script(
    'custom',
    get_stylesheet_directory_uri() . '/app.js',
    array(),
    false,
    true
  );
}

add_action('wp_enqueue_scripts', 'learningWordPress_resources');


//Get top ancestor
function get_top_ancestor_id()
{

  global $post;

  if ($post->post_parent) {

    $ancestors = array_reverse(get_post_ancestors($post->ID));
    return $ancestors[0];
  }

  return $post->ID;
}

//Does page have children?

function has_children()
{
  global $post;

  $pages = get_pages('child_of=' . $post->ID);
  return count($pages);
}

// Customize excerpt word count length

function custom_excerpt_length()
{
  return 25;
}

add_filter('excerpt_length', 'custom_excerpt_length');

//Customize excerpt ellipsis

function new_excerpt_more($more)
{
  return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

//Customize Appearance Options

function learningWordPress_customize_register($wp_customize)
{
  $wp_customize->add_setting('lwp_bg_color', array(
    'default' => '#E1DEE3',
    'transport' => 'refresh',
  ));

  $wp_customize->add_setting('lwp_footer_bg_color', array(
    'default' => '#85788e',
    'transport' => 'refresh',
  ));

  $wp_customize->add_setting('lwp_footer_widgets_color', array(
    'default' => '#120835',
    'transport' => 'refresh',
  ));

  $wp_customize->add_setting('lwp_footer_border_color', array(
    'default' => '#300842',
    'transport' => 'refresh',
  ));



  $wp_customize->add_setting('lwp_nav_link_color', array(
    'default' => '#efefef',
    'transport' => 'refresh',
  ));



  $wp_customize->add_setting('lwp_nav_background_mobile_color', array(
    'default' => '#520044',
    'transport' => 'refresh',
  ));

  $wp_customize->add_setting('lwp_nav_link_hover_color', array(
    'default' => '#fcb900',
    'transport' => 'refresh',
  ));
  $wp_customize->add_setting('lwp_logo_color', array(
    'default' => '#fcb900',
    'transport' => 'refresh',
  ));

  $wp_customize->add_setting('lwp_btn_color', array(
    'default' => '#fcb900cc',
    'transport' => 'refresh',
  ));
  $wp_customize->add_setting('lwp_btn_hover_color', array(
    'default' => '#fcb900',
    'transport' => 'refresh',
  ));

  $wp_customize->add_section('lwp_standard_colors', array(
    'title' => __('Standard Colors', 'LearningWordPress'),
    'priority' => 30,
  ));



  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lwp_bg_color_control', array(
    'label' => __('Background Color', 'LearningWordPress'),
    'section' => 'lwp_standard_colors',
    'settings' => 'lwp_bg_color',
  )));

  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lwp_footer_bg_color_control', array(
    'label' => __('Background Footer Color', 'LearningWordPress'),
    'section' => 'lwp_standard_colors',
    'settings' => 'lwp_footer_bg_color',
  )));

  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lwp_footer_widgets_color_control', array(
    'label' => __('Footer Widgets Color', 'LearningWordPress'),
    'section' => 'lwp_standard_colors',
    'settings' => 'lwp_footer_widgets_color',
  )));

  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lwp_footer_border_color_control', array(
    'label' => __('Footer Border Color', 'LearningWordPress'),
    'section' => 'lwp_standard_colors',
    'settings' => 'lwp_footer_border_color',
  )));

  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lwp_nav_link_color_control', array(
    'label' => __('Nav-Link Color', 'LearningWordPress'),
    'section' => 'lwp_standard_colors',
    'settings' => 'lwp_nav_link_color',
  )));

  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lwp_nav_link_hover_color_control', array(
    'label' => __('Nav-Link Hover Color', 'LearningWordPress'),
    'section' => 'lwp_standard_colors',
    'settings' => 'lwp_nav_link_hover_color',
  )));


  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lwp_nav_background_mobile_color_control', array(
    'label' => __('Nav-Mobile-Background Color', 'LearningWordPress'),
    'section' => 'lwp_standard_colors',
    'settings' => 'lwp_nav_background_mobile_color',
  )));

  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lwp_logo_color_control', array(
    'label' => __('Logo Color', 'LearningWordPress'),
    'section' => 'lwp_standard_colors',
    'settings' => 'lwp_logo_color',
  )));

  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lwp_btn_color_control', array(
    'label' => __('Button Color', 'LearningWordPress'),
    'section' => 'lwp_standard_colors',
    'settings' => 'lwp_btn_color',
  )));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lwp_btn_hover_color_control', array(
    'label' => __('Button Hover Color', 'LearningWordPress'),
    'section' => 'lwp_standard_colors',
    'settings' => 'lwp_btn_hover_color',
  )));
}

add_action('customize_register', 'learningWordPress_customize_register');

//Output customize CSS
function learningWordPress_customize_css()
{ ?>

  <style type="text/css">
    body {
      background-color: <?php echo get_theme_mod('lwp_bg_color'); ?>;
    }

    .footer-widgets,
    .footer-text,
    .input-search {
      background-color: <?php echo get_theme_mod('lwp_footer_bg_color'); ?>;
    }

    .footer-widgets,
    .footer-text,
    .input-search,
    .input-search::placeholder,
    .btn-search,
    .btn-search:focus~.input-search,
    .input-search:focus {
      color: <?php echo get_theme_mod('lwp_footer_widgets_color'); ?>;
    }

    .btn-search:focus~.input-search,
    .input-search:focus {
      border-bottom-color: <?php echo get_theme_mod('lwp_footer_widgets_color'); ?>;
    }

    .site-footer,
    .footer-text {
      border-top-color: <?php echo get_theme_mod('lwp_footer_border_color'); ?>;
    }

    .nav-links ul li a {
      color: <?php echo get_theme_mod('lwp_nav_link_color'); ?>
    }

    nav .nav-links ul li a:hover {
      color: <?php echo get_theme_mod('lwp_nav_link_hover_color'); ?>
    }

    nav .nav-links ul li.current-menu-item a:link,
    nav .nav-links ul li.current-menu-item a:visited,
    nav .nav-links ul li.current-page-ancestor a:link,
    nav .nav-links ul li.current-page-ancestor a:visited {
      color: <?php echo get_theme_mod('lwp_nav_link_hover_color'); ?>
    }

    .burger div {
      background-color: <?php echo get_theme_mod('lwp_nav_link_hover_color'); ?>;

    }

    @media screen and (max-width: 768px) {
    
      .menu-primary-menu-links-container {
        opacity: 0.95;
        background-color: <?php echo get_theme_mod('lwp_nav_background_mobile_color'); ?>;
      }
    }

    .btn-a,
    .btn-a:link,
    .btn-a:visited {
      background-color: <?php echo get_theme_mod('lwp_btn_color'); ?>;
      
    }

    .btn-a:hover {
      background-color: <?php echo get_theme_mod('lwp_btn_hover_color'); ?>;
    }

    a.logo {
      color: <?php echo get_theme_mod('lwp_logo_color'); ?>;
    }
  </style>
<?php
}

add_action('wp_head', 'learningWordPress_customize_css');


//Add Front Page callout section to admin appearence customize screen

function lwp_front_page_callout($wp_customize)
{
  $wp_customize->add_section('lwp-front-page-callout-section', array(
    'title' => 'Front-Page Callout',

  ));

  $wp_customize->add_setting('lwp-front-page-callout-display', array(
    'default' => 'No'
  ));
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'lwp-front-page-callout-display-control', array(
    'label' => 'Display this section?',
    'section' => 'lwp-front-page-callout-section',
    'settings' => 'lwp-front-page-callout-display',
    'type' => 'select',
    'choices' => array('No' => 'No', 'Yes' => 'Yes')
  )));

  $wp_customize->add_setting('lwp-front-page-callout-headline', array(
    'default' => 'Example Headline Text!'
  ));
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'lwp-front-page-callout-headline-control', array(
    'label' => 'Headline',
    'section' => 'lwp-front-page-callout-section',
    'settings' => 'lwp-front-page-callout-headline'
  )));

  $wp_customize->add_setting('lwp-front-page-callout-text', array(
    'default' => 'Example paragraph text.'
  ));
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'lwp-front-page-callout-text-control', array(
    'label' => 'Text',
    'section' => 'lwp-front-page-callout-section',
    'settings' => 'lwp-front-page-callout-text',
    'type' => 'textarea'
  )));

  $wp_customize->add_setting('lwp-front-page-callout-link');
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'lwp-front-page-callout-link-control', array(
    'label' => 'Link',
    'section' => 'lwp-front-page-callout-section',
    'settings' => 'lwp-front-page-callout-link',
    'type' => 'dropdown-pages'
  )));

  $wp_customize->add_setting('lwp-front-page-callout-image');
  $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'lwp-front-page-callout-image-control', array(
    'label' => 'Image',
    'section' => 'lwp-front-page-callout-section',
    'settings' => 'lwp-front-page-callout-image',
    'width' => 750,
    'height' => 600,

  )));
}

add_action('customize_register', 'lwp_front_page_callout');

function lwp_front_page_about_me($wp_customize)
{
  $wp_customize->add_section('lwp-front-page-about-me-section', array(
    'title' => 'About Me',

  ));

  $wp_customize->add_setting('lwp-front-page-about-me-display', array(
    'default' => 'No'
  ));
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'lwp-front-page-about-me-display-control', array(
    'label' => 'Display this section?',
    'section' => 'lwp-front-page-about-me-section',
    'settings' => 'lwp-front-page-about-me-display',
    'type' => 'select',
    'choices' => array('No' => 'No', 'Yes' => 'Yes')
  )));


  $wp_customize->add_setting('lwp-front-page-about-me-headline', array(
    'default' => 'About Me!'
  ));
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'lwp-front-page-about-me-headline-control', array(
    'label' => 'Headline',
    'section' => 'lwp-front-page-about-me-section',
    'settings' => 'lwp-front-page-about-me-headline'
  )));

  $wp_customize->add_setting('lwp-front-page-about-me-text', array(
    'default' => 'Example paragraph text.'
  ));
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'lwp-front-page-about-me-text-control', array(
    'label' => 'Text',
    'section' => 'lwp-front-page-about-me-section',
    'settings' => 'lwp-front-page-about-me-text',
    'type' => 'textarea'
  )));

  $wp_customize->add_setting('lwp-front-page-about-me-link');
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'lwp-front-page-about-me-link-control', array(
    'label' => 'Link',
    'section' => 'lwp-front-page-about-me-section',
    'settings' => 'lwp-front-page-about-me-link',
    'type' => 'dropdown-pages'
  )));

  $wp_customize->add_setting('lwp-front-page-about-me-image');
  $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'lwp-front-page-about-me-image-control', array(
    'label' => 'Image',
    'section' => 'lwp-front-page-about-me-section',
    'settings' => 'lwp-front-page-about-me-image',
    'width' => 850,
    'height' => 700,

  )));
}

add_action('customize_register', 'lwp_front_page_about_me');


//Theme Setup
function learningWordPress_setup()
{
  //Navigation Menus
  register_nav_menus(array(
    'primary' => __('Primary Menu'),
    'footer' => __('Footer Menu'),
  ));


  //Add featured image support
  add_theme_support('post-thumbnails');
  add_image_size('small-thumbnail', 240, 160, true);
  add_image_size('square-thumbnail', 100, 100, true);
  add_image_size('banner-image', 920, 210, true);

  add_image_size('pageBanner');

  //Add post type support
  add_theme_support('post-formats', array('aside', 'gallery', 'link'));

  //Add title and logo support
  add_theme_support('title-tag');
  add_theme_support('custom-logo');
}

add_action('after_setup_theme', 'learningWordPress_setup');


//Add Our Widget Locations

function ourWidgetsInit()
{
  register_sidebar(array(
    'name' => 'Sidebar',
    'id' => 'sidebar1',
    'before_widget' => '<div class="widget-item">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
  ));
  register_sidebar(array(
    'name' => 'Footer Area 1',
    'id' => 'footer1',
    'before_widget' => '<div class="widget-item">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
  ));
  register_sidebar(array(
    'name' => 'Footer Area 2',
    'id' => 'footer2',
    'before_widget' => '<div class="widget-item">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
  ));
  register_sidebar(array(
    'name' => 'Footer Area 3',
    'id' => 'footer3',
    'before_widget' => '<div class="widget-item">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
  ));
  register_sidebar(array(
    'name' => 'Footer Area 4',
    'id' => 'footer4',
    'before_widget' => '<div class="widget-item">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
  ));
}

add_action('widgets_init', 'ourWidgetsInit');
