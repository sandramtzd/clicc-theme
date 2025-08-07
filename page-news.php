<?php
/*
 * Template Name: News
 */
get_header();
get_template_part('template-parts/hero');
?>

<section id="news-page" class="section">
  <div class="container">
    <?php get_template_part('template-parts/news'); ?>
    
  </div>
</section>

<?php get_footer(); ?>