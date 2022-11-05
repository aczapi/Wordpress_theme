<?php

get_header();
pageBanner(array(
  'title' => 'BLOG'
)); ?>

<!-- site-content -->
<div class="site-content clearfix">

  <!-- main-column -->
  <div class="main-column">

    <?php

    if (have_posts()) :
      while (have_posts()) : the_post();

        if (!get_post_format()) {
          get_template_part('content', 'single'); ?>
          <div class="post-comment">
            <?php
            if (comments_open()) {
              comments_template();
            } ?>
          </div>
      <?php  } else {
          get_template_part('content', get_post_format());
        }


      endwhile;


    else :
      ?>
      <div class="not-found">
        <?php echo '<p>No content found</p>'; ?>
      </div>

    <?php
    endif;

    ?>

  </div><!-- /main-column -->

  <?php get_sidebar(); ?>

</div><!-- /site-content -->

<?php get_footer();

?>