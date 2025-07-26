<?php get_header(); ?>

<main class="single-post">
  <div class="container">
    <?php
    if ( have_posts() ) :
      while ( have_posts() ) : the_post(); ?>
        <article>
          <h1><?php the_title(); ?></h1>
          <div><?php the_content(); ?></div>
        </article>
      <?php endwhile;
    else :
      echo '<p>No content found.</p>';
    endif;
    ?>
  </div>
</main>

<?php get_footer(); ?>