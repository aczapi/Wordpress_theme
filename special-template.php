<?php

/*
Template Name: Special Layout
*/

get_header();


pageBanner();
?>

<!-- site-content -->
<div class="site-content clearfix">


  <?php

  if (have_posts()) :
    while (have_posts()) : the_post(); ?>

      <article class="post page">

        <?php the_content(); ?>
      </article>
    <?php endwhile;

  else :
    ?>
    <div class="not-found">
      <?php echo '<p>No content found</p>'; ?>
    </div>

  <?php

  endif; ?>

</div><!-- /site-content -->

<?php get_footer();

?>