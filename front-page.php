<?php

get_header();
pageBannerMainPage(); ?>

<!-- site-content -->
<div class="site-content front clearfix">

  <?php if (get_theme_mod('lwp-front-page-callout-display') == 'Yes') { ?>
    <div class="front-page-callout">

      <div class="front-page-callout-image">

        <img src="<?php echo wp_get_attachment_url(get_theme_mod('lwp-front-page-callout-image'));  ?>">
        <h2><a href="<?php echo get_permalink(get_theme_mod('lwp-front-page-callout-link')); ?>"><?php echo get_theme_mod('lwp-front-page-callout-headline'); ?></a></h2>
      </div>
      <div class="front-page-callout-text">
        <?php echo wpautop(get_theme_mod('lwp-front-page-callout-text')) ?>

      </div>
      
    </div>
  <?php } ?>

  <?php if (get_theme_mod('lwp-front-page-about-me-display') == 'Yes') { ?>
    <div class="about-me">

      <div class="about-me-image">
        <img src="<?php echo wp_get_attachment_url(get_theme_mod('lwp-front-page-about-me-image'));  ?>">
        <h2><a href="<?php echo get_permalink(get_theme_mod('lwp-front-page-about-me-link')); ?>"><?php echo get_theme_mod('lwp-front-page-about-me-headline'); ?></a>
        </h2>
      </div>
      <div class="about-me-text">
        <?php echo wpautop(get_theme_mod('lwp-front-page-about-me-text')) ?>
      </div>
    </div>

  <?php } ?>



</div><!-- /site-content -->

<div class="post-container clearfix">
  <!-- home-columns -->
  <div class="home-columns clearfix">

    <!-- one-half -->
    <div class="one-half">

      <h2><?php echo get_cat_name($category_id = 7); ?></h2>

      <?php 

      $opinionPosts = new WP_Query('cat=7&posts_per_page=2');

      if ($opinionPosts->have_posts()) :

        while ($opinionPosts->have_posts()) : $opinionPosts->the_post(); ?>

          <!-- post-item -->
          <div class="post-item clearfix">

            <!-- post-thumbnail -->
            <div class="square-thumbnail">
              <a href="<?php the_permalink(); ?>"><?php
                                                  if (has_post_thumbnail()) {
                                                    the_post_thumbnail('square-thumbnail');
                                                  } else { ?>

                  <img src="<?php echo get_template_directory_uri(); ?>/images/leaf.jpg">

                <?php } ?></a>
            </div><!-- /post-thumbnail -->

            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span class="subtle-date"><?php the_time('n/j/Y'); ?></span></h4>

            <?php the_excerpt(); ?>

          </div><!-- /post-item -->

      <?php endwhile;

      else :
      
      endif;
      
      wp_reset_postdata(); ?>

      <span class="horiz-center"><a href="<?php echo get_category_link(7); ?>" class="btn-a">Zobacz wszystkie</a></span>

    </div>
    <!-- one-half -->

    <!-- one-half -->
    <!-- <div class="one-half last">

      <h2><php echo get_cat_name($category_id = 12); ?></h2>

      <php
      $newPosts = new WP_Query('cat=12&posts_per_page=2');

      if ($newPosts->have_posts()) :
        while ($newPosts->have_posts()) : $newPosts->the_post(); ?>

          <-- post-item -->
    <!-- <div class="post-item clearfix"> -->

    <!-- post-thumbnail -->
    <!-- <div class="square-thumbnail">
              <a href="<php the_permalink(); ?>"><php
                                                  if (has_post_thumbnail()) {
                                                    the_post_thumbnail('square-thumbnail');
                                                  } else { ?>

                  <img src="<php echo get_template_directory_uri(); ?>/images/leaf.jpg"> -->

    <!-- <php } ?></a>
            </div><-- /post-thumbnail -->

    <!-- <h4><a href="<php the_permalink(); ?>"><php the_title(); ?></a> <span class="subtle-date"><php the_time('n/j/Y'); ?></span></h4> -->

    <!-- <php the_excerpt(); ?> -->

    <!-- </div> -->
    <!-- /post-item -->

    <!-- <php endwhile; -->

    <!-- else :
      //fallback no content message here
      endif;
      //add at the end
      wp_reset_postdata();

      ?>

      <span class="horiz-center"><a href="<php echo get_category_link(12); ?>" class="btn-a">Zobacz wszystkie</a></span>

    </div> -->
    <!-- one-half -->


    <!-- /home-columns -->


  </div>
</div>

<?php get_footer();

?>