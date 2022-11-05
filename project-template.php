<?php

/*
Template Name: Project Layout
*/

get_header();
pageBanner();
?>


<?php

if (have_posts()) :
  while (have_posts()) : the_post(); ?>

    <article class="post page portfolio">

      <!-- column-container -->
      <div class="column-container clearfix">

        <!-- title-column -->
        <div class="title-column">
          <!-- <h2>?php the_title(); ?></h2> -->
        </div><!-- /title-column -->

        <!-- text-column -->
        <div class="text-column">
          <?php the_content(); ?>

        </div> <!-- /text-column -->
      </div>
      <!--/column-container -->

    </article>
  <?php endwhile;

else :
  ?>
  <div class="not-found">
    <?php echo '<p>No content found</p>'; ?>
  </div>

<?php

endif;

get_footer();

?>