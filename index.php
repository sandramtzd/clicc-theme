<?php get_header(); ?>
<?php get_template_part('template-parts/hero'); ?>
<?php get_template_part('template-parts/clubs'); ?>
<?php get_template_part('template-parts/services'); ?>
<?php get_template_part('template-parts/news'); ?>
<?php get_template_part('template-parts/form'); ?>

<main>
  <?php /*
    if ( have_posts() ) :
      while ( have_posts() ) : the_post();
        the_title( '<h2>', '</h2>' );
        the_content();
      endwhile;
    else :
      echo '<p>No content found</p>';
    endif;
  */?>
</main>

<?php get_footer(); ?>