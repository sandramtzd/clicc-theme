<?php
/*
 * Template Name: Services
 */
get_header();
get_template_part('template-parts/hero');
?>

<section id="services-page" class="section">
  <div class="container">
    <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
        the_content(); 
      endwhile;
    endif;
    ?>
  </div>
</section>

<?php get_footer(); ?>
